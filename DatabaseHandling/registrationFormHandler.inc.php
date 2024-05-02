<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["customerName"];
    $email = $_POST["customerEmail"];
    $password = $_POST["customerPassword"];

    try {
        require_once "databaseConnect.inc.php";

        $query = "INSERT INTO customers (customerName, customerPassword, customerEmail)
                  VALUES (?, ?, ?);";
        $query2 = "INSERT INTO authentication (customerEmail, customerPassword) VALUES (?, ?);";
        $statement = $conn->prepare($query);
        $statement2 = $conn->prepare($query2);

        $statement->execute([$name, $password, $email]);
        $statement2->execute([$email, $password]);

        $conn = null;
        $statement = null;
        $statement2 = null;

        header("Location: ../login.php");
        die();

    } catch(PDOException $e){
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../register.php");
}