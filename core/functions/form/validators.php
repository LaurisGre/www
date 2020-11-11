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
