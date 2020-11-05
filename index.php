<?php

require './functions/html.php';
require './functions/form.php';
require './functions/validators.php';

$form = [
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
		<?php foreach ($form['fields'] as $input_name => $input) : ?>
			<label for="">
				<span><?php print $input['label']; ?></span>
				<input <?php print input_attr($input_name, $input); ?>>
				<?php if (isset($input['error'])) : ?>
					<p class="error"><?php print $input['error']; ?></p>
				<?php endif; ?>
			</label>
		<?php endforeach; ?>

		<?php foreach ($form['buttons'] as $button_id => $button) : ?>
			<button <?php print button_attr($button_id, $button); ?>>
				<?php print $button['title']; ?>
			</button>
		<?php endforeach; ?>
	</form>
</body>

</html>