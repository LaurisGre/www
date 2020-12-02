<?php

use App\App;

require '../../bootloader.php';

App::$db->dropTable('wall');
App::$db->createTable('wall');

header('Location: /graph/graph.php');
