<?php

use App\App;
use App\Views\BasePage;
use Core\View;

require '../../bootloader.php';

if (!App::$session->getUser()) {
    header('Location: /index.php');
    exit();
}

$content = new View([
    'title' => 'My Bricks',
    'products' => App::$db->getRowsWhere('wall'),
]);

$page = new BasePage([
    'title' => 'My Bricks',
    'content' => $content->render(ROOT . '/app/templates/content/my.tpl.php'),
]);

print $page->render();
