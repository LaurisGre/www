<?php

namespace App\Controllers\Admin;

use App\App;
use App\Controllers\Base\GuestController;
use App\Views\BasePage;
use App\Views\Forms\DeleteForm;
use App\Views\Links\EditLink;
use Core\Views\Table;

class ListController extends GuestController
{
    protected $form;
    protected $page;
    protected $table;

    public function __construct()
    {
        $this->form = new DeleteForm();
        $this->table = new Table([
            'title' => 'EDIT BRICKS',
            'headers' => [
                'X coord',
                'Y coord',
                'Color',
                'Edit',
                'Delete',
            ],
            'data' => [],
        ]);
        $this->page = new BasePage([
            'title' => 'LIST OF YOUR BRICKS',
        ]);
    }

    public function index()
    {

        // if (Form::action()) {
        $form = new DeleteForm;

        if ($form->validate()) {
            App::$db->deleteRow('wall', $this->form->values()['id']);
        }
        // }

        $all_data = App::$db->getRowsWhere('wall', ['poster' => $_SESSION['email']]);
        $user_data = [];

        foreach ($all_data as $b_index => $brick) {
            if ($brick['poster'] === $_SESSION['email']) {
                unset($brick['poster']);

                $link = new EditLink($b_index);
                $brick['link'] = $link->render();

                $this->form->fill(['id' => $b_index]);
                $brick['delete'] = $this->form->render();

                $user_data[$b_index] = $brick;
            }
        }

        $this->table->updateTableData($user_data);

        $this->page->setContent($this->table->render());

        return $this->page->render();
    }
}
