<?php

use App\App;

require '../bootloader.php';

App::$db->dropTable('users');
App::$db->createTable('users');
App::$db->insertRow('users', [
    'email' => 'place@holder.com',
    'password' => 'placeholder'
]);
App::$db->dropTable('wall');
App::$db->createTable('wall');
App::$db->save();
