<?php

use App\App;

/**
 * Generates a navigation array with the designated parameters
 *
 * @return array
 */
function nav(): array
{
    $nav_array = [
    	'Home' => [
    		'path' => '../index.php',
    		'visible' => true,
        ],
        'My Bricks' => [
            'path' => '../my.php',
    		'visible' => App::$session->getUser(),
        ],
    	'Login' => [
    		'path' => '../login.php',
    		'visible' => !App::$session->getUser(),
    	],
    	'Register' => [
    		'path' => '../register.php',
    		'visible' => !App::$session->getUser(),
    	],
    	'Add' => [
    		'path' => '../add.php',
    		'visible' => App::$session->getUser(),
    	],
    	'Logout' => [
    		'path' => '../logout.php',
    		'visible' => App::$session->getUser(),
    	],
    ];

    return $nav_array;
}
