<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!--- #CONTACT --->

    <?php
    
    // Database credentials
    $db_server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "ne";
    
    // Establish database connection
    $mysqli = new mysqli($db_server, $db_username, $db_password, $db_name);
    
    // Check connection
    if($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    
    // Process form submission
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $message = $_POST['message'];
    
        // Prepare and execute SQL query to insert form data into the database
        $sql = "INSERT INTO contact (name, phone, email, message) VALUES (?, ?, ?, ?)";
        if($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("ssss", $name, $phone, $email, $message);
            if($stmt->execute()) {
                
                echo "Submission successful!";
                // Clear form data to prevent resubmission
                $_POST = array();
            } else {
                // Submission failed
                echo "Error: " . $mysqli->error;
            }
            $stmt->close();
        }
    }
    
    // Close connection
    $mysqli->close();
    ?>
   

    <section class="section contact" id="contact">
        <div class="container">

            <div class="contact-card">



                <h2 class="h2 section-title">CONTACT US</h2>
                <p class="section-text"> IMPORTANT POLICY: WE ARE CLOSED EVERY MONDAY, AND WALK-INS ARE STRICTLY
                    PROHIBITED. </p>

                <div class="wrapper">

                <!-- <form action = "SUBMIT.php" id="contactForm" class="contact-form">

<input type="text" name="name" placeholder="Name" required class="contact-input">

<input type="number" name="phone" placeholder="Phone Number" required class="contact-input">

<input type="email" name="email" placeholder="Email" required class="contact-input">

<textarea name="message" placeholder="Message" required class="contact-input"></textarea>

<button type="submit" class="btn-submit">Submit</button>

</form> -->




                    <ul class="contact-list">

                        <li class="contact-item">

                            <div class="contact-icon">
                                <ion-icon name="location"></ion-icon>
                            </div>

                            <div>
                                <h3 class="contact-item-title">Address</h3>

                                <address class="contact-item-link">
                                    144 C. LIRIO ST. NAGCARLAN, LAGUNA
                                </address>
                            </div>

                        </li>

                        <li class="contact-item">

                            <div class="contact-icon">
                                <ion-icon name="mail"></ion-icon>
                            </div>

                            <div>
                                <h3 class="contact-item-title">Email</h3>

                                <a href="mailto:luchiesalon@gmail.com"
                                    class="contact-item-link">luchiesalon@gmail.com</a>
                            </div>

                        </li>

                        <li class="contact-item">

                            <div class="contact-icon">
                                <ion-icon name="call"></ion-icon>
                            </div>

                            <div>
                                <h3 class="contact-item-title">Phone</h3>

                                <a href="tel:+639177081846" class="contact-item-link">+63917-708-1846</a>
                            </div>

                        </li>

                    </ul>

                </div>

            </div>

        </div>
    </section>

</body>

</html>