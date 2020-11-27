<?php

require '../bootloader.php';

$nav_array = nav();

$form = [
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
                    'placeholder' => 'X coordinate',
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
            'title' => 'Add brick',
            'type' => 'submit',
            'extras' => [
                'attr' => [
                    'class' => 'btn',
                ],
            ],
        ],
    ],
    'validators' => [
        'validate_brick_unique',
    ],
    'attr' => [
        'class' => 'add_brick',
    ],
];

$clean_inputs = get_clean_input($form);

if ($clean_inputs) {
    if (validate_form($form, $clean_inputs)) {
        $clean_inputs['poster'] = $_SESSION['email'];
        $db_array = new FileDB(DB_FILE);
        $db_array->load();
        $db_array->createTable('wall');
        $db_array->insertRow('wall', $clean_inputs);
        $db_array->save();
        $message = 'New brick added successfully';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../media/style.css">
    <title>Add</title>
</head>

<body>
    <h1>ADD A NEW BRICK HERE</h1>
    <header>
        <?php require ROOT . '/core/templates/nav.tpl.php'; ?>
    </header>
    <main>
        <?php require ROOT . '/core/templates/form.tpl.php'; ?>
        <?php if ($message ?? null) : ?>
            <h2 class="add_message"><?php print $message ?? ''; ?></h2>
        <?php endif; ?>
    </main>
</body>

</html>