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
	],
	'buttons' => [
		'submit' => [
			'title' => 'Login',
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
];

$clean_inputs = get_clean_input($form);

if ($clean_inputs) {
	if (validate_form($form, $clean_inputs)) {
		login($clean_inputs);
	}
};

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/media/style.css">
	<title>Login</title>
</head>

<body>
	<h1>YOU CAN LOGIN HERE</h1>
	<header>
		<?php require ROOT . '/core/templates/nav.tpl.php'; ?>
	</header>
	<main>
		<?php require ROOT . '/core/templates/form.tpl.php'; ?>
	</main>
</body>

</html>