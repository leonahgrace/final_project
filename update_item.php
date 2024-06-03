<?php
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $id = $_POST['id'];
    $service_name = mysqli_real_escape_string($conn, $_POST['service_name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    // Update item in the database
    $sql = "UPDATE prices SET service_name = '$service_name', price = '$price' WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: admin_dashboard.php");
        exit; 
        // Redirect or display a success message as needed
    } else {
        echo "Error updating item: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>