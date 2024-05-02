<?php
//require_once 'DatabaseHandling/session_config.inc.php';
require_once 'DatabaseHandling/add_product_model.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" href="styleSheets/add_product_styles.css" />
        <link rel="stylesheet" href="styleSheets/navBar.css"/>
        <title>Add Product</title>
    </head>

    <body>
        <?php 
        include 'navBar.php';
        ?>
        <main>
            <div class="add-styles-box">
                <form action="DatabaseHandling/add_product_form.inc.php" method="POST">
                    <h2>Add Item</h2>

                    <label for="productName">Product Name</label>
                    <br>
                    <input type="text" name="productName">
                    <br>
                    <label for="productDescription">Product Description</label>
                    <br>
                    <textarea name="productDescription" rows="10" cols="40"></textarea>
                    <br>
                    <label for="productPrice">Product Price</label>
                    <br>
                    <input type="text" name="productPrice">
                    <br>
                    <label for="productAmount">Product Amount</label>
                    <br>
                    <input type="text" name="productAmount">
                    <br>
                    <label for="productImage">Product Image</label>
                    <br>
                    <input type="text" name="productImage">
                    <br><br>
                    <button class="button-style">Add Item</button>
                </form>
                <?php 
                added_success();
                ?>
            </div>
        </main>
    </body>
    <?php include 'footer.php';?>
</html>