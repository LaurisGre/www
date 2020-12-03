<?php

use App\App;
use App\Views\BasePage;
use Core\View;

require '../bootloader.php';

$h1 = 'WELCOME TO THE GREAT POOP-WALL';

$content = new View([
    'title' => 'My Bricks',
    'products' => App::$db->getRowsWhere('wall'),
]);

$page = new BasePage([
    'title' => 'My Bricks',
    'content' => $content->render(ROOT . '/app/templates/content/my.tpl.php'),
]);

print $page->render();
