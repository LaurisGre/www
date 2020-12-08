<?php

use App\Controllers\Admin\AddController;

require '../../bootloader.php';

$controller = new AddController();

print $controller->index();
