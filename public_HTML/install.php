<?php

require '../bootloader.php';
use App\App;

// App::$db = new FileDB(DB_FILE);
App::$db->dropTable('users');
App::$db->createTable('users');
App::$db->insertRow('users', [
    'email' => 'place@holder.com',
    'password1' => 'placeholder'
]);
App::$db->dropTable('wall');
App::$db->createTable('wall');
App::$db->save();
