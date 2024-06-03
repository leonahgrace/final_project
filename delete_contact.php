<?php
// Start session
session_start();

// Check if user is not logged in, redirect to login page if not logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

// Check if ID parameter is passed
if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
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

    // Prepare a delete statement
    $sql = "DELETE FROM contact_info WHERE id = ?";

    if ($stmt = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $param_id);

        // Set parameters
        $param_id = trim($_GET['id']);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect to admin dashboard after successful delete
            header("Location: admin_dashboard.php");
            exit();
        } else {
            echo "Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $mysqli->close();
} else {
    // Redirect to error page if contact ID is not provided
    header("Location: error.php");
    exit();
}
?>
