<?php

use App\App;
use App\Views\BasePage;
use App\Views\Forms\DeleteForm;
use App\Views\Links\EditLink;
// use App\Views\Tables\EditTable;
use Core\Views\Table;

require '../../bootloader.php';

if (!App::$session->getUser()) {
    header('Location: /index.php');
    exit();
}

$form = new DeleteForm;

if ($form->validate()) {
    App::$db->deleteRow('wall', $form->values()['id']);
}

$all_data = App::$db->getRowsWhere('wall', ['poster' => $_SESSION['email']]);
$user_data = [];

foreach ($all_data as $b_index => $brick) {
    if ($brick['poster'] === $_SESSION['email']) {
        unset($brick['poster']);

        $link = new EditLink($b_index);
        $brick['link'] = $link->render();

        $form->fill(['id' => $b_index]);
        $brick['delete'] = $form->render();

        $user_data[$b_index] = $brick;
    }
}

$table = new Table([
    'title' => 'EDIT BRICKS',
    'headers' => [
        'X coord',
        'Y coord',
        'Color',
        'Edit',
        'Delete',
    ],
    'data' => $user_data,
]);

// $table = new EditTable();

$page = new BasePage([
    'title' => 'List of your bricks',
    'content' => $table->render(),
]);

print $page->render();
