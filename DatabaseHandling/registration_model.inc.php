<?php

declare(strict_types=1);


function get_email(object $conn, string $email) {
    $query = "SELECT customerName FROM customers WHERE customerEmail = :email;";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $conn, string $name, string $email, string $password) {
    
        $query = "INSERT INTO customers (customerName, customerEmail, customerPassword)
                  VALUES (?, ?, ?);";
        $query2 = "INSERT INTO authentication (customerName, customerEmail, customerPassword) VALUES (?, ?, ?);";
        $statement = $conn->prepare($query);
        $statement2 = $conn->prepare($query2);

        //$options = [ 'cost'=>12 ];
        //$hashedPW = password_hash($password, PASSWORD_BCRYPT, $options)

        $statement->execute([$name, $email, $password]);
        $statement2->execute([$name, $email, $password]);
}

function update_user(object $conn, string $email, string $password) {
    $query = "UPDATE customers SET customerPassword = :password WHERE customerEmail = :email;";
    $statement = $conn->prepare($query);
    $statement->bindParam(":email", $email);
    $statement->bindParam(":password", $password);

    $statement->execute();
}
