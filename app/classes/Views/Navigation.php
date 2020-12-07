<?php

namespace App\Views;

use App\App;
use Core\View;

class Navigation extends View
{
    public function render($template_path = ROOT . '/app/templates/nav.tpl.php')
    {
        return parent::render($template_path);
    }

    public function __construct()
    {
        parent::__construct($this->generate());
    }

    /**
     * Generates a navigation array with the designated parameters
     *
     * @return void
     */
    public function generate()
    {
        $nav_array = [
            'Home' => [
                'path' => '../index.php',
                'visible' => true,
            ],
            'My Bricks' => [
                'path' => '../admin/my.php',
                'visible' => App::$session->getUser(),
            ],
            'Login' => [
                'path' => '../login.php',
                'visible' => !App::$session->getUser(),
            ],
            'Register' => [
                'path' => '../register.php',
                'visible' => !App::$session->getUser(),
            ],
            'Add' => [
                'path' => '../admin/add.php',
                'visible' => App::$session->getUser(),
            ],
            'List' => [
                'path' => '../admin/list.php',
                'visible' => App::$session->getUser(),
            ],
            'Logout' => [
                'path' => '../logout.php',
                'visible' => App::$session->getUser(),
            ],
            'Graph' => [
                'path' => '../graph/graph.php',
                'visible' => App::$session->getUser(),
            ],
            'Clear' => [
                'path' => '../graph/clear.php',
                'visible' => App::$session->getUser(),
            ],
        ];

        return $nav_array;
    }
}
