<?php

namespace App\Controllers\Admin;

use App\App;
use App\Views\BasePage;
use Core\View;

class MyController extends \App\Abstracts\Controller
{
    public function __construct()
    {
    }

    function index(): ?string
    {
        $content = new View([
            'title' => 'MY BRICKS',
            'products' => App::$db->getRowsWhere('wall',['poster' => $_SESSION['email']]),
        ]);

        $page = new BasePage([
            'title' => 'MyBricks',
            'content' => $content->render(ROOT . '/app/templates/content/index.tpl.php'),
        ]);

        return $page->render();
    }
}
