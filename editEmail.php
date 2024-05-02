<?php
    require_once 'DatabaseHandling/edit_email_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="styleSheets/edit_email_styles.css" />
        <link rel="stylesheet" href="styleSheets/navBar.css"/>
        <title>Edit Password</title>     
    </head>
    <?php include 'navBar.php';?>
    <body>
        <main>
            <div class="form-box">
                <h1>Edit Email</h1>

                <form action="DatabaseHandling/edit_email_form.inc.php" method="POST">
                    <label for="email">Email</label>
                    <br>
                    <input type="text" name="email">
                    <br>
                    <label for="new_email">New Email</label>
                    <br>
                    <input type="text" name="new_email">
                    <br><br>
                    <button class="reset-email">Reset Email</button>
                    <?php 
                        update_email_success();
                        check_errors();
                    ?>
                </form>
            </div>
        </main>
    </body>
    <?php include 'footer.php';?>
</html>