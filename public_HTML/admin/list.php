<?php

use App\App;
use App\Views\BasePage;
use App\Views\Tables\EditTable;

require '../../bootloader.php';

if (!App::$session->getUser()) {
    header('Location: /index.php');
    exit();
}

$table = new EditTable();

$page = new BasePage([
    'title' => 'List of your bricks',
    'content' => $table->render(),
]);

print $page->render();
