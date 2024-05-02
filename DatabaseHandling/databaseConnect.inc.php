<?php

$dsn = "mysql:host=localhost;dbname=csci210_kylle;charset=utf8mb4";
$dbUsername = "root";
$dbPassword = "mysql";

try {
  // Create connection
    $conn = new PDO($dsn, $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_GET["id"])){
      $product_id = $_GET["id"];

      $query = "SELECT * FROM cart WHERE product_id = $product_id";
      $result = $conn->prepare($query);
      $result->execute();
      $total_in_cart = "SELECT * FROM cart";
      $total_in_cart_result = $conn->prepare($total_in_cart);

      $total_in_cart_result->execute();

      if($result->rowCount() > 0) {

        echo json_encode(["in_cart" => "Added to Cart"]);
      } else{
          $insert = "INSERT INTO cart (product_id) VALUES ($product_id)";
          $stmt = $conn->query($insert);
          if($stmt !== false){
          
            //"num_cart" => $cart_num,
            echo json_encode(["in_cart" => "Added to Cart"]);
            
          } else {
            // Query execution failed
            $errorInfo = $conn->errorInfo();
            echo "Error: " . $errorInfo[2];
            // Handle the error accordingly
        }
        }
    }

    if (isset($_GET["cart_id"])){
      $product_id = $_GET["cart_id"];
      $delete = "DELETE FROM cart WHERE product_id=".$product_id;
      $stmt = $conn->query($delete);

      if($stmt !== false){
          
        echo "Removed From Cart";
        
      } else {
        // Query execution failed
        $errorInfo = $conn->errorInfo();
        echo "Error: " . $errorInfo[2];
        // Handle the error accordingly
    }
    } 

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


