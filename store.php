<!--C:\Program Files\Ampps\www\photos-->
<?php
    require_once "DatabaseHandling/databaseConnect.inc.php";

    $query = "SELECT * FROM products;";
    $stmt = $conn->prepare($query);

    $stmt->execute();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styleSheets/store_style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>  
</head>
<body>
    <div>
        <?php include_once 'navBar.php';?> 
        <!--#TODO: Add some sort of sorting thing to this page-->
    </div>      
    <main>
        <?php
            while($result = $stmt->fetch(PDO::FETCH_ASSOC)){           
        ?>
        <div class="card">
            <div class="image" name="productImage">
                <img src="<?php echo $result["productImage"]?>" alt="productImage">
            </div>
            <div class="caption">
                <p class="rate">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </p>
                <p class="product_name" name="productName">
                    <?php echo $result["productName"];?>
                </p>
                <p class="price" name="productPrice">
                    <b>$<?php echo $result["productPrice"];?></b>
                </p>
            </div>
            <button class="add" data-id="<?php echo $result["productID"]; ?>">Add to Cart</button>
        </div>
        <?php
        }
        ?>
    </main>
    <script>

        var product_ID = document.getElementsByClassName("add");

        for (var i = 0; i < product_ID.length; i++) {

            product_ID[i].addEventListener("click", function(event){
                
                var target = event.target;
                var id = target.getAttribute("data-id");
                var xml = new XMLHttpRequest();

                xml.onreadystatechange = function(){
                    if (this.readyState == 4 && this.status == 200){
                        //console.log(this.responseText);

                        var data = JSON.parse(this.responseText);
                        target.innerHTML = data.in_cart;
                        //document.getElementById("badge").innerHTML = data.num_cart + 1;
                    }
                }

                xml.open("GET", "DatabaseHandling/databaseConnect.inc.php?id=" + id, true);
                xml.send();
            })
        }

    </script>
</body>
<?php include 'footer.php';?>
</html>