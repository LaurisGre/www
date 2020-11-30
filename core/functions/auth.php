<?php

use App\App;

/**
 * Assigns the Session array with the users credentials
 *
 * @param array $credentials
 * @return void
 */
function login(array $credentials): void
{
    $_SESSION['email'] = $credentials['email'];
    $_SESSION['password1'] = $credentials['password1'];

    header("Location:index.php");
}

/**
 * Clears the Session array and switches to home page
 *
 * @param string $redirect
 * @return void
 */
function logout(string $redirect = null): void
{
    session_destroy();
    $redirect ? header("Location:$redirect") : '';
}

/**
 * Checks if the current user is in the database
 *
 * @return boolean
 */
function is_logged_in(): bool
{
    if ($_SESSION) {

        return (bool) App::$db->getRowWhere('users', $_SESSION);
    }

    return false;
}
