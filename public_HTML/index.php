<?php

require '../bootloader.php';

$form = [
	'attr' => [
		'method' => 'POST',
	],
	'fields' => [
		'email' => [
			'label' => 'Email',
			'type' => 'text',
			'validators' => [
				'validate_field_not_empty',
			],
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
			'validators' => [
				'validate_field_not_empty',
			],
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

$clean_inputs = get_clean_input($form);

function validate_form(array &$form, array $form_values): bool
{
	$valid = true;
	foreach ($form['fields'] as $index => $field) {
		foreach ($field['validators'] ?? [] as $val_func) {
			if (!($val_func($form_values[$index], $form['fields'][$index]))) {
				$valid = false;
			}
		}
	}
	return $valid;
}

if ($clean_inputs) {
	validate_form($form, $clean_inputs);
}

var_dump($_POST);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<title>Fuorma</title>
</head>

<body>
	<?php require ROOT . '/core/templates/form.tpl.php' ?>
</body>

</html>