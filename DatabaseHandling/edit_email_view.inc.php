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

function update_email_success() {
    if (isset($_GET["email_change"]) && $_GET["email_change"] === "success") {
        echo '<br>';
        echo '<p class="form-success">Email Changed</p>';
    }
}