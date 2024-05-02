<?php
//require_once 'DatabaseHandling/session_config.inc.php';
require_once 'DatabaseHandling/registration_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" href="styleSheets/register_styles.css" />
        <link rel="stylesheet" href="styleSheets/navBar.css"/>
        <script type="text/javascript" src="JavaScript-Code/ValidationCode.js"></script>
        <title>Register Account</title>
    </head>

    <body>
        <?php 
        include 'navBar.php';
        ?>
        <main class="centered-box">
            <div class="content-box">
                <h2>Create Account</h2>
                <form action="DatabaseHandling/registration_form.inc.php" method="POST">

                    <label for="customerName">First and Last Name</label>
                    <br>
                    <input type="text" name="customerName">
                    <br>
                    <label for="customerEmail">E-mail</label>
                    <br>
                    <input type="text" name="customerEmail">
                    <br>
                    <label for="customerPassword">Password</label>
                    <br>
                    <input type="password" name="customerPassword">
                    <br><br>
                    <button>Register</button>

                </form>
                <?php 
                check_signup_errors()
                ?>
            </div>
        </main>
    </body>
    <?php include 'footer.php';?>
</html>

