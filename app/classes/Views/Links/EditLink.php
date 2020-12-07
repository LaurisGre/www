<?php

namespace App\Views\Links;

use Core\Views\Link;

class EditLink extends Link
{
    public function __construct($value)
    {
        parent::__construct([
            'path' => "edit.php?id=$value",
            'label' => 'Edit',
            'class' => 'edit_link',
        ]);
    }
}
