<?php
    require_once 'DatabaseHandling/edit_password_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="styleSheets/edit_password_styles.css" />
        <link rel="stylesheet" href="styleSheets/navBar.css"/>
        <title>Edit Password</title>     
    </head>
    <?php include 'navBar.php';?>
    <body>
        <main>
            <div class="form-box">
                <h1>Edit Password</h1>

                <form action="DatabaseHandling/edit_password_form.inc.php" method="POST">
                    <label for="email">Email</label>
                    <br>
                    <input type="text" name="email">
                    <br>
                    <label for="password">Password</label>
                    <br>
                    <input type="password" name="password">
                    <br>
                    <label for="new_password">New Password</label>
                    <br>
                    <input type="password" name="new_password">
                    <br><br>
                    <button class="reset-password">Reset Password</button>
                    <?php 
                        update_password_success();
                        check_errors();
                    ?>
                </form>
            </div>
        </main>
    </body>
    <?php include 'footer.php';?>
</html>
