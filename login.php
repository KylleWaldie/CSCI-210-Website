<?php
//require_once 'DatabaseHandling/session_config.inc.php';
require_once 'DatabaseHandling/registration_view.inc.php';
require_once 'DatabaseHandling/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
    <link rel="stylesheet" href="styleSheets/login_styles.css" />     
        <title>Login</title>
    </head>
    <body>
    <?php include 'navBar.php';?>
        <main class="centered-box">
            <div class="content-box">
                <h2>Login</h2>
                <form name ="login" action="DatabaseHandling/login_form.inc.php" method="POST">
                
                    <label for="customerEmail">E-mail</label>
                    <br>
                    <input type="text" name="customerEmail">
                    <br>
                    <label for="customerPassword">Password</label>
                    <br>
                    <input type="password" name="customerPassword">
                    <br>
                        <button class="login-button">Login</button>
                </form>
                <br> 
                    <form name="register" action="register.php" method="GET">
                        <button class="register-button">Register</button>
                    </form>
                <div class="php-functions-container">
                    <?php 
                        signup_success();
                        check_login_errors();
                    ?>
                </div>
            </div>
        </main>
    </body>
    <?php include 'footer.php';?>
</html>