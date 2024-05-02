<?php 
    require_once 'DatabaseHandling/checkOut_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleSheets/navBar.css"/>
    <link rel="stylesheet" href="styleSheets/receipt_page_styles.css"/>
    <link rel="stylesheet" href="styleSheets/progress_bar.css"/>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>receipt page</title>
</head>
<body>
    <?php 
        include 'navBar.php';
        include 'progress_bar.php';
    ?>
    <?php
        $email = $_POST["email"];
        $name = $_POST["name"];

    ?>
    <main class="centered-box">
        <div class="content-box">
            <h1>Thanks For Your Order!</h1>
            <form id="receiptForm" action="receipt.php" method="POST" target="_blank">
                <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
                <button class="pay"> Click here for receipt </button>
            </form>
                <form action= "register_account_2.php" method="POST" target="_blank">
                <input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>">
                <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <?php 
                $check_if_pasword_is_null = "SELECT customerPassword FROM customers WHERE customerEmail = :email";
                $stmt = $conn->prepare($check_if_pasword_is_null);
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if($row) {
                    if($row["customerPassword"] === null) {
                        
                        echo '<button class="pay">Register your account</button>';
                        
                    }
                }
            ?>
            </form>
        </div>
    </main>
    <?php include 'footer.php';?>
    <script>
        $(document).ready(function(){

            const currentPage = 'receipt'; 


            $('.progress-step').removeClass('active');

            const currentStep = $(`#${currentPage}-step`);
            if (currentStep.length > 0) {
                currentStep.addClass('active');
            }
        });
 
    </script>
</body>

</html>