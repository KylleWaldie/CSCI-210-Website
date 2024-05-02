<?php
    require_once 'DatabaseHandling/checkOut_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styleSheets/navBar.css"/>
    <link rel="stylesheet" href="styleSheets/checkOut_style.css"/>
    <title>Check Out</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> 
</head>
<body>
    <?php include 'navBar.php';?>
    <?php $cart_total = $_GET["cart_total"]?>
    <?php include 'progress_bar.php';?>
<main>
    <div class="total-page">
    <form action="DatabaseHandling/checkOut_form.inc.php" method="POST">
        <div class="left-box">
            <div class="checkout-form-box">
                <h2>Delivery Address</h2>
                <br><br>
                <div class="form-group">
                    <label for="customerName">First and Last Name</label>
                    <input type="text" id="customerName" name="customerName">
                </div>

                <div class="form-group">
                    <label for="customerAddress">Address</label>
                    <input type="text" id="customerAddress" name="customerAddress">
                </div>

                <div class="form-group">
                    <label for="customerCity">City/Town</label>
                    <input type="text" id="customerCity" name="customerCity">
                </div>

                <div class="form-group">
                    <label for="customerState">State</label>
                    <input type="text" id="customerState" name="customerState">
                </div>

                <div class="form-group">
                    <label for="customerZipcode">Zipcode</label>
                    <input type="number" inputmode="numeric" id="customerZipcode" name="customerZipcode">
                </div>
                <div style="text-align: center;">
                    <?php 
                        check_signup_errors();
                    ?>
                </div>
            </div>
        </div>

        <div class="email-phone-box">
        <h2>Contact Info</h2>
        <br><br>
            <div class="form-group">
                <label for="customerEmail">Email</label>
                <input type="text" id="customerEmail" name="customerEmail">
            </div>

            <div class="form-group">
                <label for="customerPhoneNumber">Phone Number</label>
                <input type="number" id="customerPhoneNumber" name="customerPhoneNumber">
            </div>
        </div>
        <input type="hidden" name="cart_total" value="<?php echo htmlspecialchars($cart_total); ?>">
        <div class="right-box">
            <div class="top-right-box">
                <p><b>Order Summary</b></p>
                <div class="summary-item">
                    <p class="otherP">Subtotal</p>
                    <p class="price">$<?php echo $cart_total; ?></p>
                </div>
                <div class="summary-item">
                    <p class="otherP">Estimated Shipping</p>
                    <p class="price"><b>Free</b></p>
                </div>
                <div class="summary-item">
                    <p class="otherP">Total</p>
                    <p class="price">$<?php echo $cart_total; ?></p>
                </div>
                <div class="checkout">
                    <button>Continue To Billing</button>
                </div>
            </div>
        </div>
    </form>
    </div>
</main>
    <script>
        $(document).ready(function(){

                const currentPage = 'shipping';

                $('.progress-step').removeClass('active');

                const currentStep = $(`#${currentPage}-step`);
                if (currentStep.length > 0) {
                    currentStep.addClass('active');
                }
            });
    </script>
</body>
<?php include 'footer.php';?>
</html>
