<?php

declare(strict_types=1);

function get_item_info(object $conn) {
    $query = "SELECT * FROM products;";
    $stmt = $conn->prepare($query);
    //$stmt->bindParam(":id", $id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //echo $row["productName"];
    //echo implode($result);
    return $result;
}

function get_item_name() {
    $query = "SELECT productName FROM products WHERE productID = :id;";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_item_price() {
    $query = "SELECT productPrice FROM products WHERE productID = :id;";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_item_description() {
    $query = "SELECT productDescription FROM products WHERE productID = :id;";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_item_ammount() {
    $query = "SELECT productAmount FROM products WHERE productID = :id;";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}