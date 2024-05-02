<?php

function is_email_wrong($result){
    if (is_bool($result)){
        return true;
    } else {
        return false;
    }
}

function is_input_empty($email, $new_email){
    if(empty($email) || empty($new_email)) {
        return true;
    } else {
        return false;
    }
}