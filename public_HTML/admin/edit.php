<?php

use App\App;
use App\Views\BasePage;
use App\Views\Forms\EditForm;

require '../../bootloader.php';

if (!App::$session->getUser()) {
    header('Location: /index.php');
    exit();
}

$form = new EditForm();

if (App::$db->getRowById('wall', $_GET['id'])) {
    $form->fill(App::$db->getRowById('wall', $_GET['id']));
} else {
    header('Location: /index.php');
    exit();
}

if ($form->validate()) {
    $new_values = $form->values();
    $new_values['poster'] = $_SESSION['email'];
    App::$db->updateRow('wall', $_GET['id'], $new_values);
    header('Location: /admin/list.php');
}

$page = new BasePage([
    'title' => 'Edit your brick',
    'content' => $form->render(),
]);

print $page->render();
