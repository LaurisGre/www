<?php

use App\App;
use App\Views\BasePage;
use App\Views\Forms\LoginForm;

require '../bootloader.php';

if (App::$session->getUser()) {
    header('Location: /index.php');
    exit();
}

$form = new LoginForm();

if ($form->validate()) {
    $clean_inputs = $form->values();
    if (App::$session->login($clean_inputs['email'], $clean_inputs['password'])) {
        App::$tracker->updateAnonUser($clean_inputs['email']);
        header('Location: /index.php');
    };
};

// App::$tracker->clearHistory();

$page = new BasePage([
    'title' => 'YOU CAN LOGIN HERE',
    'content' => $form->render(),
]);

print $page->render();
