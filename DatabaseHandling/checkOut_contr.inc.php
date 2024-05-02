<?php

declare(strict_types=1);

function is_input_empty($name, $email, $address, $city, $state, $zip, $phoneNumber){
    if(empty($name) || empty($email) || empty($address) || empty($city) || empty($state) || empty($zip) || empty($phoneNumber)) {
        return true;
    }
    else {
        return false;
    }
}

function email_not_in_database(object $conn, string $email){
    $query = "SELECT COUNT(*) FROM customers WHERE customerEmail= :email";

    $statement = $conn->prepare($query);
    $statement->bindParam(":email", $email);
    $statement->execute();

    $num_of_rows = $statement->fetchColumn();
    if($num_of_rows < 1){
        return true;
    } else {
        return false;
    }
}