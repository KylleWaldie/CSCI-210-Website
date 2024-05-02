<?php 
session_start();
require_once 'DatabaseHandling/databaseConnect.inc.php';

$sql_cart = "SELECT * FROM cart";
$in_cart = $conn->query($sql_cart);

$cart_count = "SELECT COUNT(*) FROM cart";
$cart = $conn->prepare($cart_count);
$cart->execute();
$num_of_rows = $cart->fetchColumn();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styleSheets/navBar.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>
<body>
    <header>
        <ul>
            <li><img src="photos\Company_Icon-removebg-preview.png" alt="Company Logo" class="logo"></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="store.php">Store</a></li>
            <li><a href="contactUs.php">Contact Us</a></li>
            <li><a href="about.php">About Us</a></li>
                        <?php
                        if (isset($_SESSION["user_ID"])){
                            echo '<li><a href="addProduct.php">Add Item</a></li>
                            <li class="dropdown">
                            <a href="javascript:void(0)" class="dropbtn">Edit Info</a>
                            <div class="dropdown-content">
                                <a href="editEmail.php">Email</a>
                                <a href="editPassword.php">Password</a>
                            </div>';
                        }
                        ?>
                    <li style="float: right">
                    <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i><span id="badge"><?php echo $num_of_rows; ?></span></a>
                    </li>
                    <?php 
                        if (isset($_SESSION["user_ID"])){
                            echo "<li style='float: right'><a href='DatabaseHandling/logout.inc.php'>Logout</a></li>";
                        } else {
                            echo "<li style='float: right'><a href='login.php'>Login</a></li>";
                        }
                    ?>
                </li>
        </ul>
</header>

    
</body>
