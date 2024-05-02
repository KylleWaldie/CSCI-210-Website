<?php

function check_errors() {
    if(isset($_SESSION['errors_login'])){
        $errors = $_SESSION['errors_login'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }

        unset($_SESSION['errors_login']);
    } 
}

function update_password_success() {
    if (isset($_GET["password_change"]) && $_GET["password_change"] === "success") {
        echo '<br>';
        echo '<p class="form-success">Password Changed</p>';
    }
}