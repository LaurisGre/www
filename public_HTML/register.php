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
			$data_arr = file_to_array(DB_FILE);
			$data_arr[] = $clean_inputs;
			array_to_file($data_arr,  DB_FILE);
		}
	}
};

file_exists(DB_FILE) ? var_dump(file_to_array(DB_FILE)) : '';

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<title>Register</title>
</head>

<body>
	<header>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
				<li><a href="users.php">Users</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<h1>THIS IS THE REGISTER PAGE</h1>
		<?php require ROOT . '/core/templates/form.tpl.php'; ?>
	</main>
</body>

</html>