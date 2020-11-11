<?php

function validate_field_not_empty(string $field_value, array &$field): bool
{
	if ($field_value === '') {
		$field['error'] = 'ERROR TU DURNAS, PARAŠYK KAŽKĄ';
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

/**
 * Checks if the provided number is in the specified range
 *
 * @param string $field_value
 * @param array $field
 * @param array $params
 * @return boolean
 */
function validate_field_range(string $field_value, array &$field, array $params): bool
{
	if ($field_value < $params['min'] || $field_value > $params['max']) {
		$field['error'] = 'ERROR TU DURNAS';
		return false;
	}
	return true;
}
/**
 * Checks if the provided inputs are the same
 *
 * @param array $field_values
 * @param array $form
 * @param array $params
 * @return boolean
 */
function validate_field_match(array $field_values, array &$form, array $params): bool
{
	for ($i = 0; $i < count($params); $i++) {
		if (!($field_values[$params[0]] === $field_values[$params[$i]])) {
			$form['error'] = strtr('ERROR -- @name IS WRONG', [
				'@name' => $form['fields'][$params[$i]]['label']
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

function validate_phone (string $field_value, array &$field): bool
{
	if(substr($field_value, 0, 5) !== '+3706' || strlen($field_value) !== 12) {
		$field['error'] = 'WRONG NUMBER FOOL';
		return false;
	}
	return true;
}