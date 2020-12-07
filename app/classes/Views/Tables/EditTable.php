<?php

namespace App\Views\Tables;

use App\App;
use App\Views\Forms\DeleteForm;
use App\Views\Links\EditLink;
use Core\Views\Table;

class EditTable extends Table
{
    public function __construct()
    {
        parent::__construct([
            'title' => 'EDIT BRICKS',
            'headers' => [
                'X coord',
                'Y coord',
                'Color',
                'poster',
                'Edit',
                'Delete',
            ],
            'data' => $this->genData(),
        ]);
    }

    private function genData()
    {
        $all_data = App::$db->getRowsWhere('wall', ['poster' => $_SESSION['email']]);
        $user_data = [];
        foreach ($all_data as $b_index => $brick) {
            if ($brick['poster'] === $_SESSION['email']) {

                $link = new EditLink($b_index);
                $brick['link'] = $link->render();

                $delete_form = new DeleteForm;
                $delete_form->fill(['id' => $b_index]);
                $brick['delete'] = $delete_form->render();

                $user_data[$b_index] = $brick;
            }
        }
        return $user_data;
    }
}
