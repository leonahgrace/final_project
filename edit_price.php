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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit_price'])) {
        $price_id = $_POST['price_id'];
        $new_price = $_POST['new_price'];

        $sql_edit_price = "UPDATE prices SET price = ? WHERE id = ?";
        if ($stmt = $mysqli->prepare($sql_edit_price)) {
            $stmt->bind_param("si", $new_price, $price_id);
            if ($stmt->execute()) {
                // Redirect back to the appropriate page after editing
                if ($_POST['redirect'] === 'index') {
                    header("Location: index.php");
                } else if ($_POST['redirect'] === 'admin_dashboard') {
                    header("Location: admin_dashboard.php");
                } else {
                    echo "Invalid redirect.";
                }
            } else {
                echo "Error editing price.";
            }
            $stmt->close();
        }
    }
}

// Close connection
$mysqli->close();
?>
