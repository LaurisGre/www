<?php

require '../bootloader.php';

$form = [
	'attr' => [
		'method' => 'POST',
	],
	'fields' => [
		// 	'text1' => [
		// 		'label' => 'FIRST STRING',
		// 		'type' => 'text',
		// 		'validators' => [
		// 			'validate_field_not_empty',
		// 			'validate_text_length' => [
		// 				'min' => 0,
		// 				'max' => 5,
		// 			],
		// 		],
		// 		'extras' => [
		// 			'attr' => [
		// 				'placeholder' => '',
		// 				'class' => 'input-field',
		// 			],
		// 		],
		// 	],
		// 	'text2' => [
		// 		'label' => 'SECOND STRING',
		// 		'type' => 'text',
		// 		'validators' => [
		// 			'validate_field_not_empty',
		// 			'validate_text_length' => [
		// 				'min' => 0,
		// 				'max' => 5,
		// 			],
		// 		],
		// 		'extras' => [
		// 			'attr' => [
		// 				'placeholder' => '',
		// 				'class' => 'input-field',
		// 			],
		// 		],
		// 	],
		// 	'text3' => [
		// 		'label' => 'THIRD STRING',
		// 		'type' => 'text',
		// 		'validators' => [
		// 			'validate_field_not_empty',
		// 			'validate_text_length' => [
		// 				'min' => 0,
		// 				'max' => 5,
		// 			],
		// 		],
		// 		'extras' => [
		// 			'attr' => [
		// 				'placeholder' => '',
		// 				'class' => 'input-field',
		// 			],
		// 		],
		// 	],
		// 	'phone_number' => [
		// 		'label' => 'Enter phone number +3706XXXXXXX',
		// 		'type' => 'text',
		// 		'validators' => [
		// 			'validate_field_not_empty',
		// 			'validate_phone',
		// 		],
		// 		'extras' => [
		// 			'attr' => [
		// 				'placeholder' => '',
		// 				'class' => 'input-field',
		// 			],
		// 		],
		// 	],
		'number' => [
			'label' => 'Guess the root if you dare:',
			'type' => 'text',
			'value' => rand(4, 100),
			'validators' => [],
			'extras' => [
				'attr' => [
					'class' => 'input-field grey',
					'readonly' => 'readonly',
				],
			],
		],
		'answer' => [
			'label' => 'Answer:',
			'type' => 'text',
			'validators' => [
				'validate_field_not_empty',
				'validate_field_number',
			],
			'extras' => [
				'attr' => [
					'class' => 'input-field',
					'placeholder' => 'your answer here:'
				],
			],
		],
	],

	'buttons' => [
		'submit' => [
			'title' => 'Numbers?',
			'type' => 'submit',
			'extras' => [
				'attr' => [
					'class' => 'btn',
				],
			],
		],
	],
	// 'validators' => [
	// 	'validate_field_match' => [
	// 		'text1',
	// 		'text2',
	// 		'text3',
	// 	]
	// ]
];

var_dump($_POST);

$clean_inputs = get_clean_input($form);

if ($clean_inputs) {
	$message = validate_form($form, $clean_inputs) ? calc_diff($clean_inputs) : 'NOT NICE';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<title>Maffs</title>
</head>

<body>
	<h1>quick maffs</h1>
	<?php require ROOT . '/core/templates/form.tpl.php'; ?>
	<?php if (isset($message)) : ?>
		<p><?php print $message; ?></p>
	<?php endif; ?>
</body>

</html>