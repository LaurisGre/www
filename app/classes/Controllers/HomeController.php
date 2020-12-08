<?php

namespace App\Controllers;

use App\App;
use App\Views\BasePage;
use Core\View;

class HomeController extends \App\Abstracts\Controller
{
    public function __construct()
    {
    }

    function index(): ?string
    {
        $content = new View([
            'title' => 'Home',
            'products' => App::$db->getRowsWhere('wall'),
        ]);

        $page = new BasePage([
            'title' => 'Index',
            'content' => $content->render(ROOT . '/app/templates/content/index.tpl.php'),
        ]);

        return $page->render();
    }
}
