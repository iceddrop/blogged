<?php

declare(strict_type=1);

function is_input_empty(string $userName, string $pwd){
    if(empty($userName) || empty($pwd)){
        return true;
    } else {
        return false;
    }

}

function is_username_wrong(bool|array $result){
    if (!$result){
        return true;
    } else {
        return false;
    }
}

function does_password_match(string $pwd, string $hashedPwd){
    if (!password_verify($pwd, $hashedPwd)){
        return true;
    } else {
        return false;
    }
}