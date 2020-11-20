<?php

require '../../bootloader.php';

$nav_array = nav();

$form = [
	'attr' => [
		'method' => 'POST',
	],
	'fields' => [
		'img' => [
			'label' => 'Image',
			'type' => 'text',
			'value' => '',
			'validators' => [
				'validate_field_not_empty',
			],
		],
		'model' => [
			'label' => 'Car model',
			'type' => 'text',
			'value' => '',
			'validators' => [
				'validate_field_not_empty',
			],
		],
		'make' => [
			'label' => 'Car make',
			'type' => 'text',
			'value' => '',
			'validators' => [
				'validate_field_not_empty',
			],
		],
		'year' => [
			'label' => 'Year of manufacture',
			'type' => 'number',
			'value' => '',
			'validators' => [
				'validate_field_not_empty',
				'validate_field_is_integer',
			],
		],
		'price' => [
			'label' => 'Asking price',
			'type' => 'number',
			'value' => '',
			'validators' => [
				'validate_field_not_empty',
				'validate_field_numeric',
			],
		],
		'contact' => [
			'label' => 'Contact eMail',
			'type' => 'email',
			'value' => '',
			'validators' => [
				'validate_field_not_empty',
				'validate_email',
			],
		],
	],
	'buttons' => [
		'submit' => [
			'title' => 'Add post',
			'type' => 'submit',
			'extras' => [
				'attr' => [
					'class' => 'btn',
				],
			],
		],
	],
	'attr' => [
		'class' => 'add_post',
	],
];

$clean_inputs = get_clean_input($form);

if ($clean_inputs) {
	if (validate_form($form, $clean_inputs)) {
		$data_arr = file_to_array(DB_FILE);
		$clean_inputs['poster'] = $_SESSION['user_email'];
		$clean_inputs['posted'] = date("Y-m-d") . ' ' . date("H:i:s");
		$data_arr['items'][] = $clean_inputs;
		array_to_file($data_arr, DB_FILE);
		$message = 'New post addedd successfully';
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../style.css">
	<title>Add</title>
</head>

<body>
	<h1>ADD A NEW POST HERE</h1>
	<header>
		<?php require ROOT . '/core/templates/nav.tpl.php'; ?>
	</header>
	<main>
		<?php require ROOT . '/core/templates/form.tpl.php'; ?>
		<?php print $message ?? ''; ?>
	</main>
</body>

</html>