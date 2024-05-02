<?php

function add_item(object $conn, string $productName, string $productDescription, float $productPrice, int $productAmount, string $productPhoto){
        $query = "INSERT INTO products (productName, productDescription, productPrice, productAmount, productImage)
                  VALUES (?, ?, ?, ?, ?);";
        $image .= "photos/" .$productPhoto;
        $stmt = $conn->prepare($query);
        $stmt->execute([$productName, $productDescription, $productPrice, $productAmount, $image]);

}

function added_success() {
    if (isset($_GET["added"]) && $_GET["added"] === "success") {
        echo '<br>';
        echo '<p class="form-success">Product Added</p>';
    }
}