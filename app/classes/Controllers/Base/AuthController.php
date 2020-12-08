<?php

namespace App\Controllers\Base;

use App\App;

class AuthController
{
    protected $redirected = '/login.php';

    public function __construct()
    {
        if (!App::$session->getUser()) {
            header("Location: $this->redirected");
            exit();
        }
    }
}