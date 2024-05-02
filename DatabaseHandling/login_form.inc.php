<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["customerEmail"];
    $password = $_POST["customerPassword"];

    try {

        require_once 'databaseConnect.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';
        
        //ERROR HANDLING
        $errors = [];

        if (is_input_empty($email, $password)) { 
            $errors["empty_input"] = "Fill in all fields!";
        }

        $result = get_email($conn, $email);
        
        if(is_email_wrong($result)){
            //echo "Incorrect login info.";
            $errors["login_incorrect"] = "Incorrect login info!";
        }
        if(!is_email_wrong($result) && is_password_wrong($password, $result["customerPassword"])){
            $errors["login_incorrect"] = "Incorrect login info!";
            //echo "Incorrect login info.";
        }
        
        require_once 'session_config.inc.php';
        if ($errors) {
            $_SESSION["errors_login"] = $errors;
            header("Location: ../login.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["customerID"];
        session_id($sessionId);

        $_SESSION["user_ID"] = $result["customerID"];
        $_SESSION["customerName"] = htmlspecialchars($result["customerName"]);

        $_SESSION["last_regeneration"] = time();

        header("Location: ../index.php");

        $conn = null;
        $stmt = null;
        die();

    } catch(PDOException $e){
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../login.php");
    die();
}