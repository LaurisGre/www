<?php

require '../bootloader.php';

$nav_array = nav();

$form = [
    'attr' => [
        'method' => 'POST',
    ],
    'fields' => [
        'email' => [
            'label' => 'Email',
            'type' => 'email',
            'value' => '',
            'validators' => [
                'validate_field_not_empty',
                'validate_email',
            ],
            'extras' => [
                'attr' => [
                    'placeholder' => 'your email here',
                ],
            ],
        ],
        'password1' => [
            'label' => 'Password',
            'type' => 'password',
            'value' => '',
            'validators' => [
                'validate_field_not_empty',
            ],
            'extras' => [
                'attr' => [
                    'placeholder' => 'your password here',
                ],
            ],
        ],
        'password2' => [
            'label' => 'Password repeat',
            'type' => 'password',
            'value' => '',
            'validators' => [
                'validate_field_not_empty',
            ],
            'extras' => [
                'attr' => [
                    'placeholder' => 'repeat your password',
                ],
            ],
        ],
    ],
    'buttons' => [
        'submit' => [
            'title' => 'Register',
            'type' => 'submit',
            'extras' => [
                'attr' => [
                    'class' => 'btn',
                ],
            ],
        ],
    ],
    'validators' => [
        'validate_field_match' => [
            'password1',
            'password2',
        ],
    ],
];

$clean_inputs = get_clean_input($form);

if ($clean_inputs) {
    if (validate_form($form, $clean_inputs)) {
        unset($clean_inputs['password2']);

        if (validate_user_unique($clean_inputs, $form)) {
            $db_array = new FileDB(DB_FILE);
            $db_array->load();
            $db_array->createTable('users');
            $db_array->insertRow('users', $clean_inputs);
            $db_array->save();
            header("Location:login.php");
        }
    }
};

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/media/style.css">
    <title>Register</title>
</head>

<body>
    <h1>YOU CAN REGISTER HERE</h1>
    <header>
        <?php require ROOT . '/core/templates/nav.tpl.php'; ?>
    </header>
    <main>
        <?php require ROOT . '/core/templates/form.tpl.php'; ?>
    </main>
</body>

</html>