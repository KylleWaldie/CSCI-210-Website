<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $new_email = $_POST["new_email"];


    try {
        require_once "databaseConnect.inc.php";
        require_once "edit_email_model.inc.php";
        require_once "edit_email_contr.inc.php";

        //ERROR HANDLING
        $errors = [];

        if (is_input_empty($email, $new_email)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        
        $result = get_email($conn, $email);
        if(is_email_wrong($result)){
            $errors["email_incorrect"] = "Email not in system";
        }

        require_once 'session_config.inc.php';
        if ($errors) {
            $_SESSION["errors_login"] = $errors;
            header("Location: ../editEmail.php");
            die();
        }


        update_email($conn, $email, $new_email);
        header("Location: ../editEmail.php?email_change=success");
        $conn = null;
        $statement = null;
        die();

    } catch(PDOException $e){
        die("Query Failed: " . $e->getMessage());
    }
}  else {
    header("Location: ../editEmail.php");
}