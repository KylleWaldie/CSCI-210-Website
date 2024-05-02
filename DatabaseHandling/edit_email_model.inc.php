<?php

declare(strict_types=1);

function update_email(object $conn, string $email, string $new_email) {
    $query = "UPDATE customers SET customerEmail = :new_email WHERE customerEmail = :email;";
    $statement = $conn->prepare($query);
    $statement->bindParam(":email", $email);
    $statement->bindParam("new_email", $new_email);

    $statement->execute();
}

function get_email(object $conn, string $email){
    $query = "SELECT * FROM customers WHERE customerEmail = :email;";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}