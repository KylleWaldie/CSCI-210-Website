<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["customerName"];
    $email = $_POST["customerEmail"];
    $password = $_POST["customerPassword"];


    try {
        require_once "databaseConnect.inc.php";
        require_once "registration_model.inc.php";
        require_once "registration_contr.inc.php";

        //ERROR HANDLING
        $errors = [];

        if (is_input_empty($name, $email, $password)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        if (is_email_invalid($email)){
            $errors["invalid_email"] = "Invalid Email used!";
        }

        if (is_email_registered($conn, $email)){
            $errors["email_used"] = "Email already registered!";
        }

        require_once 'session_config.inc.php';
        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../register.php");
            die();
        }

        set_user($conn, $name, $email, $password);
        header("Location: ../login.php?signup=success");
        $conn = null;
        $statement = null;
        $statement2 = null;
        die();

    } catch(PDOException $e){
        die("Query Failed: " . $e->getMessage());
    }
}  else {
    header("Location: ../register.php");
}