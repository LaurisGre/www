<?php

function validate_field_not_empty(string $field_value, array &$field): bool
{
	if ($field_value === '') {
		$field['error'] = 'ERROR TU DURNS, PARAŠYK KAŽKĄ';
		return false;
	}
	return true;
}

function validate_space(string $field_value, array &$field): bool
{
	if (strpos(trim($field_value, ' '), ' ') === false) {
		$field['error'] = 'ERROR TU NENORMALUS, KUR TARPAS?';
		return false;
	}
	return true;
}

function validate_age(string $field_value, array &$field): bool
{
	if ($field_value < 18) {
		$field['error'] = 'ERROR TU NENORMALUS, PER JAUNAS';
		return false;
	}
	if ($field_value > 100) {
		$field['error'] = 'ERROR TU NENORMALUS, PER SENAS';
		return false;
	}
	return true;
}

function validate_field_range(string $field_value, array &$field, array $params): bool
{
	if ($field_value < $params['min'] || $field_value > $params['max']) {
		$field['error'] = 'ERROR TU DURNS';
		return false;
	}
	return true;
}

function validate_field_match(array $field_values, array &$form, array $params): bool
{
	foreach ($params as $par_value) {
		if (!($field_values[$params[0]] === $field_values[$par_value])) {
			$form['error'] = strtr('ERROR -- @name IS INCORRECT', [
				'@name' => $form['fields'][$par_value]['label']
			]);
			return false;
		}
	}

	return true;
}

function validate_text_length(string $field_value, array &$field, array $params): bool
{
	if (strlen($field_value) < $params['min'] || strlen($field_value) > $params['max']) {
		$field['error'] = strtr('ERROR STRING MUST BE NO LESS THAN @min AND NO MORE THAN @max', [
			'@min' => $params['min'],
			'@max' => $params['max'],
		]);
		return false;
	}
	return true;
}

function validate_phone(string $field_value, array &$field): bool
{
	if (substr($field_value, 0, 5) !== '+3706' || strlen($field_value) !== 12) {
		$field['error'] = 'WRONG NUMBER FOOL';
		return false;
	}
	return true;
}

function validate_field_number(string $field_value, array &$field): bool
{
	if (!(is_numeric($field_value))) {
		$field['error'] = 'THAT\'S NOT A NUMBER FOOL';
		return false;
	}
	return true;
}

function validate_select(string $field_value, array &$field): bool
{
	if (!(array_key_exists($field_value, $field['options']))) {
		$field['error'] = 'ERROR INPUT DOESN\'T EXIST';
		return false;
	}
	return true;
}

function validate_email(string $field_value, array &$field): bool
{
	if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $field_value)) {
		$field['error'] = 'ERROR THAT\'S NOT A VALID EMAIL';
		return false;
	}
	return true;
}
