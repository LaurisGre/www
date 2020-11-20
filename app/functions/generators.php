<?php

function nav()
{
	$nav_array = [
		'Home' => [
			'path' => '../index.php',
			'visible' => true,
		],
		'Login' => [
			'path' => '../login.php',
			'visible' => !is_logged_in(),
		],
		'Register' => [
			'path' => '../register.php',
			'visible' => !is_logged_in(),
		],
		'Add' => [
			'path' => '../admin/add.php',
			'visible' => is_logged_in(),
		],
		'Logout' => [
			'path' => '../logout.php',
			'visible' => is_logged_in(),
		],
	];

	return $nav_array;
}
