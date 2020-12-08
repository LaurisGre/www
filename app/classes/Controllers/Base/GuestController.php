<?php

namespace App\Controllers\Base;

use App\App;

class GuestController
{
    protected $redirected = '/index.php';

    public function __construct()
    {
        if (App::$session->getUser()) {
            header("Location: $this->redirected");
            exit();
        }
    }
}
