<?php

use App\App;
use App\Views\BasePage;
use App\Views\Forms\AddForm;

require '../bootloader.php';

$form = new AddForm();

if ($form->validate()) {
    $clean_inputs = $form->values();
    $clean_inputs['poster'] = $_SESSION['email'];
    App::$db->insertRow('wall', $clean_inputs);
}

$page = new BasePage([
    'title' => 'Add',
    'content' => $form->render(),
]);

print $page->render();
