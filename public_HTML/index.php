<?php

require '../bootloader.php';

$form = [
	'attr' => [
		'method' => 'POST',
	],
	'fields' => [
		'name' => [
			'label' => '',
			'type' => 'text',
			'validators' => [
				'validate_field_not_empty',
				'validate_space',
			],
			'extras' => [
				'attr' => [
					'placeholder' => 'Name and Surname',
					'class' => 'input-field',
				],
			],
		],
		'age' => [
			'label' => '',
			'type' => 'number',
			'validators' => [
				'validate_field_not_empty',
				'validate_age',
			],
			'extras' => [
				'attr' => [
					'placeholder' => 'Age',
					'class' => 'input-field',
				],
			],
		],
	],
	'buttons' => [
		'norm' => [
			'title' => 'Am I normal?',
			'type' => 'submit',
			'extras' => [
				'attr' => [
					'class' => 'btn',
				],
			],
		],
	],
];

var_dump($_POST);

$clean_inputs = get_clean_input($form);

if ($clean_inputs) {
	validate_form($form, $clean_inputs) ?
		var_dump('NORMALUS') :
		var_dump('NENORMALUS');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<title>Fuorma</title>
</head>

<body>
	<?php require ROOT . '/core/templates/form.tpl.php'; ?>
</body>

</html>