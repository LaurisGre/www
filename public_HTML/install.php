<?php

use App\App;

require '../bootloader.php';

$_SESSION = [];
session_destroy();

App::$db->dropTable('users');
App::$db->createTable('users');
App::$db->insertRow('users', [
    'email' => 'a@a.com',
    'password' => 'a'
]);
App::$db->dropTable('wall');
App::$db->createTable('wall');
App::$db->dropTable('tracker_table');
App::$db->createTable('tracker_table');
App::$db->save();
