<?php

namespace App\Views\Forms;

use Core\Views\Form;

class GraphForm extends Form
{
    public function __construct()
    {
        parent::__construct([
            'attr' => [
                'method' => 'POST',
            ],
            'fields' => [
                'equation' => [
                    'label' => 'Equation',
                    'type' => '',
                    'value' => '',
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                    'extras' => [
                        'attr' => [
                            'placeholder' => 'ex: y =  x**2',
                        ],
                    ],
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Graphicatuje panie',
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
        ]);
    }
}
