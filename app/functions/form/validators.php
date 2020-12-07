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

/**
 * Checks if the current user is allowed to edit
 *
 * @param array $inputs
 * @param array $form
 * @return boolean
 */
function validate_user_edit(array $inputs, array &$form): bool
{
    if (App::$db->getRowById('wall', $_GET['id'])['poster'] !== $_SESSION['email']) {
        $form['error'] = 'ERROR YOU\'RE NOT ALLOWED TO EDIT THAT';
        return false;
    }

    return true;
}

/**
 * Checks if the given row exists in the data table
 *
 * @param array $inputs
 * @param array $form
 * @return boolean
 */
function validate_row_exists(array $inputs, array &$form): bool
{
    if(App::$db->rowExists('wall', $inputs['id'])){
        return true;
    }

    return false;
}

/**
 * Checks if the current user is allowed to delete
 *
 * @param array $inputs
 * @param array $form
 * @return boolean
 */
function validate_user_delete(array $inputs, array &$form): bool
{
    if (App::$db->getRowById('wall', $inputs['id'])['poster'] !== $_SESSION['email']) {
        $form['error'] = 'ERROR YOU\'RE NOT ALLOWED TO DELETE THAT';
        return false;
    }

    return true;
}

