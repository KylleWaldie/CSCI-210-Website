<?php

function is_password_wrong($result){
    if (is_bool($result)){
        return true;
    } else {
        return false;
    }
}

function is_input_empty($email, $password, $new_password){
    if(empty($email) || empty($password) || empty($new_password)) {
        return true;
    } else {
        return false;
    }
}