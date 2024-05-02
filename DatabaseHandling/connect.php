<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "csci210_kylle";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";


$sql = "SELECT customerID, customerName, customerEmail FROM customers";
$result = $conn->query($sql);

if (!empty($result) && $result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["customerID"]. " - Name: " . $row["customerName"]. " " . $row["customerEmail"]. "<br>";
  }
} else {
  echo "0 results";
}
