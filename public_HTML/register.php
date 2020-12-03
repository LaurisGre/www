<?php

use App\App;
use App\Views\BasePage;
use App\Views\Forms\RegisterForm;

require '../bootloader.php';

if (App::$session->getUser()) {
    header('Location: /index.php');
    exit();
}

$form = new RegisterForm();

if ($form->validate()) {
    $clean_inputs = $form->values();
    unset($clean_inputs['password_repeat']);
    $user = $clean_inputs;
    App::$db->insertRow('users', $clean_inputs);
    header("Location:login.php");
};

$page = new BasePage([
    'title' => 'YOU CAN REGISTER HERE',
    'content' => $form->render(),
]);

print $page->render();
