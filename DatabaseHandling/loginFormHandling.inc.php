<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["customerEmail"];
    $password = $_POST["customerPassword"];

    try {
        require_once "databaseConnect.inc.php";

        $query = "INSERT INTO customers (customerName, customerPassword, customerEmail)
                  VALUES (?, ?, ?);";

        $statement = $conn->prepare($query);

        $statement->execute([$name, $password, $email]);

        $conn = null;
        $statement = null;

        header("Location: ../login.php");
        die();

    } catch(PDOException $e){
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../register.php");
}