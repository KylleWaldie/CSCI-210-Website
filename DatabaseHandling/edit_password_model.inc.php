<?php

declare(strict_types=1);

function update_password(object $conn, string $email, string $password, string $new_password) {
    $query = "UPDATE customers SET customerPassword = :password WHERE customerEmail = :email;";
    $statement = $conn->prepare($query);
    $statement->bindParam(":email", $email);
    $statement->bindParam(":password", $new_password);

    $statement->execute();
}

function get_password(object $conn, string $password){
    $query = "SELECT * FROM customers WHERE customerPassword = :password;";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":password", $password);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
