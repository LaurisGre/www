<?php

require '../bootloader.php';

$form = [
	'attr' => [
		'method' => 'POST',
	],
	'fields' => [
		'head_select' => [
			'label' => 'Select yuor head',
			'type' => 'select',
			'value' => 'head1',
			'options' => [
				'head1' => 'Bird',
				'head2' => 'Skull',
				'head3' => 'Cow',
			],
			'extras' => [
				'attr' => [
					'class' => 'selector',
				],
			],
			'validators' => [
				'validate_select',
			],
		],
		'body_select' => [
			'label' => 'Select your body',
			'type' => 'select',
			'value' => 'body1',
			'options' => [
				'body1' => 'Muscle',
				'body2' => 'Rider',
				'body3' => 'Business',
			],
			'extras' => [
				'attr' => [
					'class' => 'selector',
				],
			],
			'validators' => [
				'validate_select',
			],
		],
	],
	'buttons' => [
		'submit' => [
			'title' => 'Give me my new body',
			'type' => 'submit',
			'extras' => [
				'attr' => [
					'class' => 'btn',
				],
			],
		],
	],

];

$clean_inputs = get_clean_input($form);

if ($clean_inputs) {
	if (validate_form($form, $clean_inputs)) {
		$body_parts = $clean_inputs;
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<title>Selectorz</title>
</head>

<body>
	<?php require ROOT . '/core/templates/form.tpl.php'; ?>
	<?php if ($body_parts ?? false) : ?>
		<article class="body_box">
			<?php foreach ($body_parts as $part => $option) : ?>
				<div class="<?php print "$part $option"; ?>"></div>
			<?php endforeach; ?>
		</article>
	<?php endif; ?>
</body>

</html>