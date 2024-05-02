<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $productName = $_POST["productName"];
    $productPrice = $_POST["productPrice"];

    try{
        require_once "databaseConnect.inc.php";
        include_once "add_product_to_cart_model.inc.php";

        add_to_cart($productName, $productPrice);

        header("Location: ../display_full_product.php?display_full_product=success");
    } catch (PDOException $e){
        die("Query Failed: " . $e->getMessage());
    }

} else {
    header("Location: ../store.php");
}