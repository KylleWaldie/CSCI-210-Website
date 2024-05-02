<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleSheets/navBar.css"/>
    <link rel="stylesheet" href="styleSheets/billing_styles.css"/>
    <link rel="stylesheet" href="styleSheets/progress_bar.css"/>
    <title>Billing</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
<?php include 'navBar.php';?>
    <?php 
        $cart_total = $_GET["cart_total"];
        $email = $_GET["email"];
        $customer_name = $_GET["name"];
    ?>
    <?php include 'progress_bar.php';?>
    <main class="billing"> 
        <div class="container">
            <h1>Confirm Payment Info</h1>
            <div class="first-row">
                <div class="name">
                    <h3>Name on Card</h3>
                    <div class="input-field">
                        <input type="text" id="nameOnCard">
                    </div>
                </div>
                <div class="cvv">
                    <h3>Security Code(CVV)</h3>
                    <div class="input-field">
                        <input type="password" id="cvv">
                    </div>
                </div>
            </div>

            <div class="second-row">
                <div class="card-number">
                    <h3>Card Number(No dashes or spaces)</h3>
                    <div class="input-field">
                        <input type="text" class="creditCardText" id="cardNumber">
                    </div>
                </div>
            </div>

            <div class="third-row">
                <h3>Expiration Date</h3>
                <div class="selection">
                    <div class="date">
                        <select name="months" id="months">
                            <option value="Jan">01-January</option>
                            <option value="Feb">02-February</option>
                            <option value="Mar">03-March</option>
                            <option value="Apr">04-April</option>
                            <option value="May">05-May</option>
                            <option value="Jun">06-June</option>
                            <option value="Jul">07-Jul</option>
                            <option value="Aug">08-August</option>
                            <option value="Sep">09-September</option>
                            <option value="Oct">10-October</option>
                            <option value="Nov">11-November</option>
                            <option value="Dec">12-December</option>
                        </select>
                        <select name="years" id="years">
                            <option value="2027">2027</option>
                            <option value="2026">2026</option>
                            <option value="2025">2025</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                        </select>
                    </div>
                    <div class="card-icons">
                        <img src="photos/visa_logo.png" alt="visa">
                        <img src="photos/mastercard.png" alt="mastercard">
                        <img src="photos/discover_logo.png" alt="discover">
                    </div>
                </div>
            </div>
            <form action="receipt_page.php" method="POST" onsubmit="return checkForm()">
                <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
                <input type="hidden" name="name" value="<?php echo htmlspecialchars($customer_name); ?>">
                <button class="pay"> Pay $<?php echo $cart_total; ?> </button>
            </form>
        </div>
    </main>
    <script>
        //used Javascript so i could pass $email and $customerName easier
        function checkForm() {
            var nameOnCard = document.getElementById("nameOnCard").value.trim();
            var cvv = document.getElementById("cvv").value.trim();
            var cardNumber = document.getElementById("cardNumber").value.trim();
            
            if (nameOnCard === "" || cvv === "" || cardNumber === "") {
                alert("Please fill in all fields.");
                return false;
            }
            return true;
        }

        $('.creditCardText').keyup(function() {
            var add_dashes = $(this).val().split("-").join("");
            if (add_dashes.length > 0) {
                add_dashes = add_dashes.match(new RegExp('.{1,4}', 'g')).join("-");
            }
            $(this).val(add_dashes);
        });

        $(document).ready(function(){

            const currentPage = 'billing'; 

            
            $('.progress-step').removeClass('active');

            const currentStep = $(`#${currentPage}-step`);
            if (currentStep.length > 0) {
                currentStep.addClass('active');
            }
        });
    </script>
    <?php include 'footer.php';?>
</body>
</html>