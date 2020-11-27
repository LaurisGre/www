<?php
/**
 * Checks if the new user's email is already in the database
 *
 * @param array $new_user
 * @param array $form
 * @return boolean
 */
function validate_user_unique(array $new_user, array &$form): bool
{
    $db_array = new FileDB(DB_FILE);
    $db_array->load();

    if ($db_array->getRowWhere('users', $new_user)) {
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
    $db_array = new FileDB(DB_FILE);
    $db_array->load();

    if ($db_array->getRowWhere('users', $inputs)) {
        return true;
    };

    $form['error'] = 'ERROR WRONG LOGIN INFO';

    return false;
}
