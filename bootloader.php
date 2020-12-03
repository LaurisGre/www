<?php

use App\App;

define('ROOT', __DIR__);
define('DB_FILE', ROOT . '/app/data/db.json');

date_default_timezone_set('Europe/Vilnius');

// Core
require 'core/functions/html.php';
require 'core/functions/file.php';
require 'core/functions/form/validators.php';

// App
require 'app/functions/form/validators.php';

// Composer 
require 'vendor/autoload.php';

$app = new App();
