<?php
// Start session
session_start();

// Check if user is not logged in, redirect to login page if not logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

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

// Check if ID parameter is passed
if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
    // Prepare SQL statement
    $sql = "SELECT id, type, info FROM contact_info WHERE id = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("i", $param_id);
        $param_id = trim($_GET['id']);

        // Execute the statement
        if ($stmt->execute()) {
            $stmt->store_result();

            // Check if the contact exists
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($id, $type, $info);
                $stmt->fetch();
            } else {
                // Redirect to error page if contact ID is invalid
                header("Location: error.php");
                exit();
            }
        } else {
            echo "Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }
}

// Process form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    $input_type = trim($_POST["type"]);
    $input_info = trim($_POST["info"]);

    // Check if all fields are filled
    if (!empty($input_type) && !empty($input_info)) {
        // Prepare an update statement
        $sql = "UPDATE contact_info SET type=?, info=? WHERE id=?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssi", $param_type, $param_info, $param_id);

            // Set parameters
            $param_type = $input_type;
            $param_info = $input_info;
            $param_id = $id;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to admin dashboard after successful update
                header("Location: admin_dashboard.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    } else {
        echo "Please fill out all fields.";
    }
}

// Close connection
$mysqli->close();
?>
