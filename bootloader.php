<?php

use App\App;

define('ROOT', __DIR__);
define('DB_FILE', ROOT . '/app/data/db.json');

// Core
require 'core/functions/html.php';
require 'core/functions/file.php';
require 'core/functions/form/core.php';
require 'core/functions/form/validators.php';

// App
require 'app/functions/form/validators.php';
require 'app/functions/generators.php';

// Composer classes
require 'vendor/autoload.php';
$app = new App();
