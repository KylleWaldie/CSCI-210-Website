<?php

function add_to_cart($productName, $productPrice){

    $product_Names = array();
    $product_prices = array();
    $product_Names = [$productName];
    $product_prices = [$productPrice];

}
function login_success($product_name, $product_price) {
    if (isset($_GET["display_full_product"]) && $_GET["display_full_product"] === "success") {
        echo $product_name;
        echo $product_price;
    }
}
