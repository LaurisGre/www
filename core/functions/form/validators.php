<?php 

function validate_field_not_empty(string $field_value, array &$field): bool
{
	if($field_value === '') {
		$field['error'] = 'ERROR TU DURNAS';
		return false;
	}
	return true;
}
