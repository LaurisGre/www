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
                    'label' => '',
                    'type' => '',
                    'value' => '',
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
                            'class' => 'btn',
                        ],
                    ],
                ],
            ],
            'validators' => [
                'validate_login'
            ],
            'attr' => [
                'class' => 'delete_form',
            ],
        ]);
    }
}
