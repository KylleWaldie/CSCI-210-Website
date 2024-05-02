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

        require_once 'session_config.inc.php';
        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../register_form_2.php");
            die();
        }

        update_user($conn, $email, $password);
        header("Location: ../login.php?signup=success");
        $conn = null;
        $statement = null;
        die();

    } catch(PDOException $e){
        die("Query Failed: " . $e->getMessage());
    }
}  else {
    header("Location: ../register_form_2.php");
}