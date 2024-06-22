<?php

declare(strict_types=1);


//checks if any of the inputs are empty
function is_input_empty($userName, $email, $pwd){
    if (empty($userName) || empty($email) || empty($pwd)){
               return true;
    } else {
        return false;
    }
}

//checks if email is valid
function is_email_invalid($email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
               return true;
    } else {
               return false;
    }
}

//checks if username is taken
function is_username_taken(object $pdo, string $userName){
    if (get_username($pdo, $userName)){
        return true;
    } else {
        return false;
    }
}

//checks if email is registered
function is_email_registered(object $pdo, string $email){
    if (get_email($pdo, $email)){
        return true;
    } else {
        return false;
    }
}