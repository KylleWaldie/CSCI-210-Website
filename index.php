<?php
require_once 'DatabaseHandling/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="styleSheets/index_styles.css" />
        <title>Home Page</title>  
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>   
    </head>
    <body>
        <?php include 'navBar.php';?>
        <main>
            <div class="top">
                <img src="photos\silhouette-forest-landscape-background.jpg" alt="GreenMountain" style="width: 100%;height: 500px;">
                <h1>Kylles E-Commerce Site</h1>
                <h3>
                    <?php
                        output_name()
                    ?>
                </h3>
            </div>
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <img src="photos/t-shirt.jpg" alt="Photo 1">
                    <div class="text">Pink T-Shirt</div>
                </div>
                <div class="mySlides fade">
                    <img src="photos/tie-dye-witch-hat.jpg" alt="Photo 2">
                    <div class="text">Tie Dye Witch hat</div>
                </div>
                <div class="mySlides fade">
                    <img src="photos/socks.jpg" alt="Photo 3">
                    <div class="text">Socks</div>
                </div>
                <div class="mySlides fade">
                    <img src="photos/giant-pink-flamingo-pool-float.jpg" alt="Photo 4">
                    <div class="text">Pink Flamingo Pool Float</div>
                </div>
                <div class="mySlides fade">
                    <img src="photos\Logitech-mouse.jpg" alt="Photo 5">
                    <div class="text">Logitech Pro Wireless Gaming</div>
                </div>
                <div class="mySlides fade">
                    <img src="photos\headphones-2.jpg" alt="Photo 6">
                    <div class="text">Sony WH-CH520 Wireless</div>
                </div>
                <div class="mySlides fade">
                    <img src="photos\monitor-1.jpg" alt="Photo 7">
                    <div class="text">KOORUI 27 inch Curved Computer</div>
                </div>
                <div class="mySlides fade">
                    <img src="photos\flex-experience-run-12-mens-road-running-shoes-lqThC9.png" alt="Photo 8">
                    <div class="text">Nike Flex Experience Run 12</div>
                </div>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
        </main>
        <script>
            var slideIndex = 1;
            showSlides(slideIndex);
            function plusSlides(n) {
                showSlides(slideIndex += n);
            }
            function currentSlide(n) {
                showSlides(slideIndex = n);
            }
            function showSlides(n) {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                if (n > slides.length) {slideIndex = 1}    
                if (n < 1) {slideIndex = slides.length}
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";  
                }
                slides[slideIndex-1].style.display = "block";  
            }

            var slideInterval = setInterval(function() {
                plusSlides(1);
            }, 4000);
        </script>
    </body>
    <?php include 'footer.php';?>
</html>