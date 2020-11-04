<?php

require './functions/html.php';

$form = [
	'fields' => [
		'email' => [
			'label' => 'Email',
			'type' => 'text',
			'value' => 'email@email.com',
			'extras' => [
				'attr' => [
					'placeholder' => 'Aurimas',
					'class' => 'input-field',
				],
			],
		],
		'password' => [
			'label' => 'Password',
			'type' => 'password',
			'extras' => [
				'attr' => [
					'placeholder' => 'Your password',
					'class' => 'input-field',
				],
			],
		],
	],
	'buttons' => [
		'login' => [
			'title' => 'Log in',
			'type' => 'submit',
			'extras' => [
				'attr' => [
					'class' => 'btn',
				],
			],
		],
		'clear' => [
			'title' => 'Clear',
			'type' => 'clear',
			'extras' => [
				'attr' => [
					'class' => 'btn',
				],
			],
		],
	],
];

function get_clean_input($arr)
{
	$params = [];
	foreach ($arr as $index => $input) {
		$params[$index] = FILTER_SANITIZE_SPECIAL_CHARS;
	}

	return filter_input_array(INPUT_POST, $params);
}

$clean_inputs = get_clean_input($form);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<title>Fuorma</title>
</head>

<body>
	<form method="POST">
		<!-- <?php foreach ($form['fields'] as $field) : ?>
			<input <?php print html_attr($field); ?>>
		<?php endforeach; ?>
		<?php foreach ($form['buttons'] as $button) : ?>
			<input <?php print html_attr($button); ?>>
		<?php endforeach; ?> -->
	</form>
</body>

</html>