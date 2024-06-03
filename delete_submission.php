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

// Check if submission ID is provided in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute SQL query to delete submission from database
    $sql = "DELETE FROM contact_submissions WHERE id = ?";
    if($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("i", $id);
        if($stmt->execute()) {
            // Deletion successful, redirect back to admin dashboard
            header("Location: admin_dashboard.php");
            exit;
        } else {
            // Deletion failed
            echo "Error: " . $mysqli->error;
        }
        $stmt->close();
    }
} else {
    echo "Submission ID not provided.";
}



// Close connection
$mysqli->close();
?>