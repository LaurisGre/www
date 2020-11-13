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
		$message = array_to_file($clean_inputs,  DB_FILE) ? 'NICE' : 'NOT NICE';
	}
};

var_dump(file_to_array(DB_FILE));

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<title>Register</title>
</head>

<body>
    <h1>THIS IS THE REGISTER PAGE</h1>
	<?php require ROOT . '/core/templates/form.tpl.php'; ?>
	<?php if ($message ?? false) : ?>
		<p><?php print $message; ?></p>
	<?php endif; ?>
</body>

</html>