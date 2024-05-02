<?php

declare(strict_types=1);

function is_input_empty(string $name, string $email, string $password){
    if(empty($name) || empty($email) || empty($password)) {
        return true;
    }
    else {
        return false;
    }
}

function is_email_invalid(string $email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    else {
        return false;
    }
}


function is_email_registered(object $conn, string $email){
    if(get_email($conn, $email)) {
        return true;
    }
    else {
        return false;
    }
}

function create_user(object $conn, string $name, string $email, string $password) {
    set_user($conn, $name, $email, $password);
}