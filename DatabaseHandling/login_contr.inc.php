<?php

//declare(strict_types=1);

function is_input_empty($email, $password){
    if(empty($email) || empty($password)) {
        return true;
    } else {
        return false;
    }
}

function is_email_wrong($result){
    if (is_bool($result)){
        return true;
    } else {
        return false;
    }
}

function is_password_wrong($password, $userPassword){
    if ($password !== $userPassword){
        return true;
    } else {
        return false;
    }
}