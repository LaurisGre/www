<?php

use App\App;

/**
 * Checks if the new user's email is already in the database
 *
 * @param array $new_user
 * @param array $form
 * @return boolean
 */
function validate_user_unique(array $new_user, array &$form): bool
{
    if (App::$db->getRowWhere('users', $new_user)) {
        $form['error'] = 'ERROR USER WITH THAT EMAIL ALREADY EXISTS';

        return false;
    };

    return true;
}

/**
 * Checks if the given email-password combination exists in the database
 *
 * @param array $inputs
 * @param array $form
 * @return boolean
 */
function validate_login(array $inputs, array &$form): bool
{
    if (App::$db->getRowWhere('users', $inputs)) {
        return true;
    };

    $form['error'] = 'ERROR WRONG LOGIN INFO';

    return false;
}

/**
 * Checks if the given brick is not set in the database
 *
 * @param array $inputs
 * @param array $form
 * @return boolean
 */
function validate_brick_unique(array $inputs, array &$form): bool
{
    unset($inputs['color']);
    unset($inputs['poster']);

    if (App::$db->getRowWhere('wall', $inputs)) {
        $form['error'] = 'ERROR BRICK ALREADY EXISTS';
        return false;
    };

    return true;
}
