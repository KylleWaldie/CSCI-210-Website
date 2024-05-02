<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $new_password = $_POST["new_password"];


    try {
        require_once "databaseConnect.inc.php";
        require_once "edit_password_model.inc.php";
        require_once "edit_password_contr.inc.php";

        //ERROR HANDLING
        $errors = [];

        if (is_input_empty($email, $password, $new_password)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        
        $result = get_password($conn, $password);
        if(is_password_wrong($result)){
            $errors["password_incorrect"] = "Incorrect Password!";
        }

        require_once 'session_config.inc.php';
        if ($errors) {
            $_SESSION["errors_login"] = $errors;
            header("Location: ../editPassword.php");
            die();
        }


        update_password($conn, $email, $password, $new_password);
        header("Location: ../editPassword.php?password_change=success");
        $conn = null;
        $statement = null;
        die();

    } catch(PDOException $e){
        die("Query Failed: " . $e->getMessage());
    }
}  else {
    header("Location: ../editPassword.php");
}