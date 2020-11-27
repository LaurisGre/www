<?php

/**
 * Generates a navigation array with the designated parameters
 *
 * @return array
 */
function nav():array
{
	$nav_array = [
		'Home' => [
			'path' => '../index.php',
			'visible' => true,
        ],
        'My Bricks' => [
            'path' => '../my.php',
			'visible' => is_logged_in(),
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
			'path' => '../add.php',
			'visible' => is_logged_in(),
		],
		'Logout' => [
			'path' => '../logout.php',
			'visible' => is_logged_in(),
		],
	];

	return $nav_array;
}
