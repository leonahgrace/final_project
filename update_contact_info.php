<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ne";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $email = $_POST['email'];
    $phone = $_POST['mobile'];
    $address = $_POST['Address'];

    // Prepare SQL statement to update contact information
    $sql = "UPDATE contactinformation SET Email=?, Phone=?, Address=?";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $email, $phone, $address);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Contact information updated successfully";
    } else {
        echo "Error updating contact information: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();

    header("Location: admin_dashboard.php");
    exit();
}
?>