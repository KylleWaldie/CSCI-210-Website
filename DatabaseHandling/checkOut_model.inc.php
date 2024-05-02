<?php

declare(strict_types=1);

function add_user_data(object $conn, string $email, string $address, string $city, string $state, int $zip, int $phoneNumber) {

    $query = "UPDATE customers SET customerAddress = :address, customerCity = :city, customerState = :state, customerZipcode = :zipcode, customerPhonenumber = :phonenumber
              WHERE customerEmail = :email;";
    
    
    
    $statement = $conn->prepare($query);
    $statement->bindParam(":address", $address);
    $statement->bindParam(":city", $city);
    $statement->bindParam(":state", $state);
    $statement->bindParam(":zipcode", $zip);
    $statement->bindParam(":phonenumber", $phoneNumber);
    $statement->bindParam(":email", $email);
    $statement->execute();
}

function create_user_and_add_user_data(object $conn, string $name, string $email, string $address, string $city, string $state, int $zip, int $phoneNumber){
    $query = "INSERT INTO customers (customerName, customerEmail, customerAddress, customerCity, customerState, customerZipcode, customerPhoneNumber)
                VALUES (:name, :email, :address, :city, :state, :zip, :phone)";
        
        $statement = $conn->prepare($query);
        $statement->bindParam(":name", $name);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":address", $address);
        $statement->bindParam(":city", $city);
        $statement->bindParam(":state", $state);
        $statement->bindParam(":zip", $zip);
        $statement->bindParam(":phone", $phoneNumber);

        $statement->execute();
}

