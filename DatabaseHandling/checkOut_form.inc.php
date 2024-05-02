<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $cart_total = $_POST["cart_total"];

    $name = $_POST["customerName"];
    $email = $_POST["customerEmail"];
    $address = $_POST["customerAddress"];
    $city = $_POST["customerCity"];
    $state = $_POST["customerState"];
    $zip = $_POST["customerZipcode"];
    $phoneNumber = $_POST["customerPhoneNumber"];
    
    

    try {
        require_once "databaseConnect.inc.php";
        require_once "checkOut_model.inc.php";
        require_once "checkOut_contr.inc.php";
        
        //ERROR HANDLING
        $errors = [];

        if (is_input_empty($name, $email, $address, $city, $state, $zip, $phoneNumber)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        require_once 'session_config.inc.php';
        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../checkOut.php?cart_total=".$cart_total);
            die();
        }

        if(email_not_in_database($conn, $email)){
            create_user_and_add_user_data($conn, $name, $email, $address, $city, $state, $zip, $phoneNumber);
            header("Location: ../billing.php?cart_total=".urlencode($cart_total) ."&email=" . urlencode($email) . "&name=" . urlencode($name));

        } else {
            add_user_data($conn, $email, $address, $city, $state, $zip, $phoneNumber);
            // Redirect back to the same page
            header("Location: ../billing.php?cart_total=".urlencode($cart_total) ."&email=" . urlencode($email) . "&name=" . urlencode($name));
        }
        $conn = null;
        $statement = null;
        die();

    } catch(PDOException $e){
        die("Query Failed: " . $e->getMessage());
    }
}  else {
    header("Location: ../checkOut.php?cart_total=".$cart_total);
    exit();
}