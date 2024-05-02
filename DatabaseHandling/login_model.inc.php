<?php

declare(strict_types=1);

function get_email(object $conn, string $email){
    $query = "SELECT * FROM customers WHERE customerEmail = :email;";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}