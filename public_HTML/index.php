<?php

use App\App;
use App\Views\BasePage;
use Core\View;

require '../bootloader.php';

$content = new View([
    'title' => 'Home',
    'products' => App::$db->getRowsWhere('wall'),
]);

$page = new BasePage([
    'title' => 'Index',
    'content' => $content->render(ROOT . '/app/templates/content/index.tpl.php'),
]);

print $page->render();
