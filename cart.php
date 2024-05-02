<?php

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleSheets/cart_style.css" />
    <link rel="stylesheet" href="styleSheets/navBar.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <title>Your Cart</title>
</head>

<body>
    <?php
    include 'navBar.php';
    ?>
    <main>

        <h2><?php echo $num_of_rows; ?> items</h2>

        <?php
            $cart_total = 0;
            while($result = $in_cart->fetch(PDO::FETCH_ASSOC)){
                $sql = "SELECT * FROM products WHERE productID=".$result["product_id"];
                $all_product = $conn->prepare($sql);
                $all_product->execute();
                
                while($result2 = $all_product->fetch(PDO::FETCH_ASSOC)){
        ?>
        <div class="card">
            <div class="images">
                <img src="<?php echo $result2["productImage"]?>" alt="Product Photo">
            </div>

            <div class="caption">
                <p class="rate">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </p>
                <p class="product_name">
                    <?php echo $result2["productName"]?>
                </p>
                <p class="price">
                    <?php echo $result2["productPrice"]?>
                </p>
                <button class="remove" data-id="<?php echo $result2["productID"]; ?>" >Remove from cart</button>
            </div>
        </div>
        <?php
                $cart_total += $result2["productPrice"];
            }
        }
        ?>
        <div class="top-right-box">
            <p><b>Order Summary</b></p>
            <br>
            <div class="summary-item">
                <p class="otherP">Subtotal</p>
                <p class="otherP">$<?php echo $cart_total; ?></p>
            </div>
            <div class="summary-item">
                <p class="otherP">Estimated Shipping</p>
                <p class="otherP"><b>FREE</b></p>
            </div>
            <br>
            <div class="summary-item">
                <p class="otherP">Total</p>
                <p id ="cart_total" class="otherP">$<?php echo $cart_total; ?></p>
            </div>
            <div class="checkout">
                <form method="GET" action="checkOut.php" onsubmit="return checkNumOfRows()">
                    <input type="hidden" name="cart_total" value="<?php echo htmlspecialchars($cart_total); ?>">
                    <button>Check Out</button></a>
                </form>
            </div>
        </div>
    </main>
    <?php include 'footer.php';?>
    <script>
        var remove = document.getElementsByClassName("remove");
        for(var i = 0; i < remove.length; i++){
            remove[i].addEventListener("click", function(event){
                var target = event.target;
                var cart_id = target.getAttribute("data-id");
                var xml = new XMLHttpRequest();
                xml.onreadystatechange = function(){
                    if (this.readyState == 4 && this.status == 200){
                        
                        target.innerHTML = this.responseText;
                        target.style.opacity = .3;
                    }
                }

                xml.open("GET", "DatabaseHandling/databaseConnect.inc.php?cart_id=" + cart_id, true);
                xml.send();
            })
        }

        function checkNumOfRows() {
            <?php

            $num_of_rows; 
            ?>

   
            if (<?php echo $num_of_rows; ?> === 0) {
                alert('Add items to cart before checkout');
                return false; 
            } else {
                return true;
            }
        }
    </script>
</body>
</html>