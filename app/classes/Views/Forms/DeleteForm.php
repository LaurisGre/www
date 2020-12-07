<?php

namespace App\Views\Forms;

use Core\Views\Form;

class DeleteForm extends Form
{
    public function __construct()
    {
        parent::__construct([
            'attr' => [
                'method' => 'POST',
            ],
            'fields' => [
                'id' => [
                    'type' => 'hidden',
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Delete',
                    'type' => 'submit',
                    'extras' => [
                        'attr' => [
                            'class' => 'edit_link',
                        ],
                    ],
                ],
            ],
            'validators' => [
                'validate_row_exists',
                'validate_user_delete',
            ],
            'attr' => [
                'class' => 'delete_form',
            ],
        ]);
    }
}
