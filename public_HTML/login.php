<?php

require '../bootloader.php';

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
		'validate_login',
	],
];

$clean_inputs = get_clean_input($form);

if ($clean_inputs) {
	if (validate_form($form, $clean_inputs)) {
		login($clean_inputs);
	}
};

file_exists(DB_FILE) ? var_dump(file_to_array(DB_FILE)) : '';

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<title>Login</title>
</head>

<body>
	<header>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
				<li><a href="users.php">Users</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<?php require ROOT . '/core/templates/form.tpl.php'; ?>
	</main>
</body>

</html>