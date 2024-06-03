<?php
// Database credentials
$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "ne"; 

// Establish database connection
$mysqli = new mysqli($db_server, $db_username, $db_password, $db_name);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare and execute SQL query to insert form data into the database
    $sql = "INSERT INTO contact (name, phone, email, message) VALUES (?, ?, ?, ?)";
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param("ssss", $name, $phone, $email, $message);
    if ($stmt->execute()) {
        // Data insertion successful
        ?>
        <script>
            alert("Thank you for messaging");
            window.location.href = "index.php"; // Redirect to index.php after displaying the alert
        </script>
        <?php
        exit(); // Make sure to exit after sending the JavaScript to prevent further execution
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