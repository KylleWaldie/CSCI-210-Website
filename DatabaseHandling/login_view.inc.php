<?php

declare(strict_types=1);

function output_name() {
    if (isset($_SESSION["user_ID"])){
        echo "You are logged in as " . $_SESSION["customerName"];
    } else {
        echo "";
    }
}

function check_login_errors() {
    if(isset($_SESSION['errors_login'])){
        $errors = $_SESSION['errors_login'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }

        unset($_SESSION['errors_login']);
    } 
}

function login_success() {
    if (isset($_GET["login"]) && $_GET["login"] === "success") {
        echo '<br>';
        echo '<p class="form-success">Signed In</p>';
    }
}
