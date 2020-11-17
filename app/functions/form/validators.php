<?php

function validate_user_unique(array $new_user, array &$form): bool
{
	$data = file_to_array(DB_FILE) ?: [];

	foreach ($data as $user) {
		if ($user['email'] === $new_user['email']) {
			$form['error'] = 'ERROR USER WITH THAT EMAIL ALREADY EXISTS';
			return false;
		}
	}

	return true;
}

function validate_login(array $inputs, array &$form): bool
{
	$data = file_to_array(DB_FILE) ?: [];

	foreach ($data as $user) {
		if (
			$user['email'] === $inputs['email'] &&
			$user['password1'] === $inputs['password1']
		) {
			return true;
		}
	}

	$form['error'] = 'ERROR NO USER WITH THAT EMAIL FOUND';
	return false;
}
