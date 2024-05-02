<?php


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $productName = $_POST["productName"];
    $productDescription = $_POST["productDescription"];
    $productPrice = $_POST["productPrice"];
    $productAmount = $_POST["productAmount"];
    $productPhoto = $_POST["productImage"];

    try {
        require_once "databaseConnect.inc.php";
        require_once "add_product_model.inc.php";

        add_item($conn, $productName, $productDescription, $productPrice, $productAmount, $productPhoto);

        header("Location: ../addProduct.php?added=success");
    } catch(PDOException $e){
        die("Query Failed: " . $e->getMessage());
    }

    $conn = null;
    $stmt = null;

    die();
} else {
    header("Location: ../addProduct.php");
}