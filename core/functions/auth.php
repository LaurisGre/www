<?php

function login(array $credentials): void
{
	$_SESSION['user_email'] = $credentials['email'];
	$_SESSION['user_password'] = $credentials['password1'];

	header("Location:index.php");
}

function logout(string $redirect = null): void
{
	session_destroy();
	$redirect ? header("Location:$redirect") : '';
}

function is_logged_in(): bool
{
	if ($_SESSION) {
		$data = file_to_array(DB_FILE) ?: [];
		foreach ($data['users'] ?? [] as $user) {
			if (
				$user['email'] === $_SESSION['user_email'] &&
				$user['password1'] === $_SESSION['user_password']
			) {
				return true;
			}
		}
	}

	return false;
}
