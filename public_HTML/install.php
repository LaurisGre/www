<?php

require '../bootloader.php';
$db_array = new FileDB(DB_FILE);

$db_array->createTable('users');
$db_array->insertRow('users', [
    'email' => 'place@holder.com',
    'password' => 'placeholder'
]);

$db_array->createTable('items');

$db_array->save();