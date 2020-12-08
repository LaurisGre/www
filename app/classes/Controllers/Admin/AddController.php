<?php

namespace App\Controllers\Admin;

use App\App;
use App\Controllers\Base\GuestController;
use App\Views\BasePage;
use App\Views\Forms\AddForm;

class AddController extends GuestController
{
    protected $form;
    protected $page;

    public function __construct()
    {
        $this->form = new AddForm();
        $this->page = new BasePage([
            'title' => 'YOU CAN ADD BRICKS HERE',
        ]);
    }

    public function index()
    {
        if (!App::$session->getUser()) {
            header('Location: /login.php');
            exit();
        }

        if ($this->form->validate()) {
            $clean_inputs = $this->form->values();
            $clean_inputs['poster'] = $_SESSION['email'];
            App::$db->insertRow('wall', $clean_inputs);
        };

        $this->page->setContent($this->form->render());

        return $this->page->render();
    }
}
