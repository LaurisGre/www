<?php

function get_clean_input(array $form)
{
	$parameters = [];
	foreach ($form['fields'] as $index => $input) {
		$parameters[$index] = FILTER_SANITIZE_SPECIAL_CHARS;
	}
	return filter_input_array(INPUT_POST, $parameters);
}

function validate_form(array &$form, array $form_values): bool
{
	$valid = true;
	foreach ($form['fields'] as $index => &$field) {
		foreach ($field['validators'] ?? [] as $function) {
			if (!($function($form_values[$index], $field))) {
				$valid = false;
				break;
			}
		}
	}
	return $valid;
}
