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
                <form action="DatabaseHandling/registration_form_2.inc.php" method="POST">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST"){
                        $name = $_POST["name"];
                        $email = $_POST["email"];
                    }
                    ?>
                        <label for="customerName">First and Last Name</label>
                        <br>
                        <input type="text" name="customerName" id="customerName" value="<?php echo $name; ?>">
                        <br>
                        <label for="customerEmail">E-mail</label>
                        <br>
                        <input type="text" name="customerEmail" id ="customerEmail" value="<?php echo $email; ?>">
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
