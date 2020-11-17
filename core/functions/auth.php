<?php 

function login(array $credentials){
    $_SESSION['user_email'] = $credentials['email'];
    $_SESSION['user_password'] = $credentials['password1'];
}