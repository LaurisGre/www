<?php

namespace App\Controllers\Admin;

use App\App;
use App\Controllers\Base\GuestController;
use App\Views\BasePage;
use App\Views\Forms\EditForm;

class EditController extends GuestController
{
    protected $form;
    protected $page;

    public function __construct()
    {
        $this->form = new EditForm();
        $this->page = new BasePage([
            'title' => 'YOU CAN EDIT HERE',
        ]);
    }

    public function index()
    {
        if (App::$db->getRowById('wall', $_GET['id'])) {
            $this->form->fill(App::$db->getRowById('wall', $_GET['id']));
        } else {
            header('Location: /list.php');
            exit();
        }

        if ($this->form->validate()) {
            $new_values = $this->form->values();
            $new_values['poster'] = $_SESSION['email'];
            App::$db->updateRow('wall', $_GET['id'], $new_values);
            header('Location: /admin/list.php');
        };

        $this->page->setContent($this->form->render());

        return $this->page->render();
    }
}
