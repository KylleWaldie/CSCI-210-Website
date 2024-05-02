<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="styleSheets/contact_us_styles.css" />
        <link rel="stylesheet" href="styleSheets/navBar.css"/>
        
        <title>Contact Page</title>       
    </head>
    <body>
    <?php include 'navBar.php';?>
        <main>            
            <div class="contact-box">
                <h1>Contact Us</h1>
                <div>
                    <form name="contactUs" method="POST">
                        <label for="name">First Name and Last Name</label>
                        <br>
                        <input type="text" id="name" name="name">
                        <br>
                        <label for="phoneNumber">Phone Number</label>
                        <br>
                        <input type="text" id="phoneNumber" name="phoneNumber">
                        <br>
                        <label for="email">Email</label>
                        <br>
                        <input type="text" id="email" name="email">
                        <br>
                        <br>
                        <label for="message">Write Your Message Here</label>
                        <br>
                        <textarea id="message" name="message" rows="10" cols="40"></textarea>
                        <br><br>
                            <button>Submit</button>
                    </form>
                </div>
            </div>
            <h3>Or call 777-777-7777</h3>
        </main>
        <?php include 'footer.php';?>
    </body>
</html>