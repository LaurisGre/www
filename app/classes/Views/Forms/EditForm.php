<?php

namespace App\Views\Forms;

use Core\Views\Form;

class EditForm extends Form
{
    public function __construct()
    {
        parent::__construct([
            'attr' => [
                'method' => 'POST',
            ],
            'fields' => [
                'coord_x' => [
                    'label' => 'X coordinate (10px apart)',
                    'type' => 'number',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_field_is_numeric',
                        'validate_field_range' => [
                            'min' => 0,
                            'max' => 490,
                        ],
                        'validate_number_step' => [
                            'step' => 10,
                        ],
                    ],
                    'extras' => [
                        'attr' => [
                            'placeholder' => 'X coordinate',
                            'min' => 0,
                            'max' => 490,
                            'step' => 10,
                        ],
                    ]
                ],
                'coord_y' => [
                    'label' => 'Y coordinate (10px apart)',
                    'type' => 'number',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_field_is_numeric',
                        'validate_field_range' => [
                            'min' => 0,
                            'max' => 490,
                        ],
                        'validate_number_step' => [
                            'step' => 10,
                        ],
                    ],
                    'extras' => [
                        'attr' => [
                            'placeholder' => 'Y coordinate',
                            'min' => 0,
                            'max' => 490,
                            'step' => 10,
                        ],
                    ]
                ],
                'color' => [
                    'label' => 'Color',
                    'type' => 'select',
                    'value' => '',
                    'options' => [
                        'red' => 'Red',
                        'lawngreen' => 'Green',
                        'gold' => 'Yellow',
                        'black' => 'Black',
                    ],
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_select',
                    ],
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Edit brick',
                    'type' => 'submit',
                    'extras' => [
                        'attr' => [
                            'class' => 'btn',
                        ],
                    ],
                ],
            ],
            'validators' => [
                'validate_user_edit',
            ],
            'attr' => [
                'class' => 'add_brick',
            ],
        ]);
    }
}
