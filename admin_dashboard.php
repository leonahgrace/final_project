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

// Fetch user information from database
$sql = "SELECT username FROM users WHERE id = ?";
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param("i", $param_id);
    $param_id = $_SESSION["user_id"];

    if ($stmt->execute()) {
        $stmt->store_result();
        if ($stmt->num_rows == 1) {
            $stmt->bind_result($username);
            if ($stmt->fetch()) {
                $welcome_message = "Welcome, {$username}!";
            }
        }
    }

    // Close statement
    $stmt->close();
}

// Fetch submissions from database
$sql = "SELECT id, name, phone, email, message FROM contact";
$result = $mysqli->query($sql);

// PRICES from database
$sql_prices = "SELECT id, service_name, price FROM prices";
$result_prices = $mysqli->query($sql_prices);

// Add Price Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_price'])) {
        $service_name = $_POST['service_name'];
        $price = $_POST['price'];

        $sql_add_price = "INSERT INTO prices (service_name, price) VALUES (?, ?)";
        if ($stmt = $mysqli->prepare($sql_add_price)) {
            $stmt->bind_param("si", $service_name, $price);
            if ($stmt->execute()) {
                header("Refresh:0");
            } else {
                echo "Error adding price.";
            }
            $stmt->close();
        }
    }

}

// Delete Price
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $sql_delete_price = "DELETE FROM prices WHERE id = ?";
    if ($stmt = $mysqli->prepare($sql_delete_price)) {
        $stmt->bind_param("i", $delete_id);
        if ($stmt->execute()) {
            header("Refresh:0");
        } else {
            echo "Error deleting price.";
        }
        $stmt->close();
    }
}

// Handle search query
$search = isset($_GET['search']) ? "%" . $mysqli->real_escape_string($_GET['search']) . "%" : "%";

// Fetch contact submissions with search filter
$sql_contact = "SELECT id, name, phone, email, message FROM contact WHERE id LIKE ? OR name LIKE ? OR phone LIKE ? OR email LIKE ?";
$stmt_contact = $mysqli->prepare($sql_contact);
$stmt_contact->bind_param("ssss", $search, $search, $search, $search);
$stmt_contact->execute();
$result_contact = $stmt_contact->get_result();

// Fetch prices
$sql_prices = "SELECT id, service_name, price FROM prices";
$result_prices = $mysqli->query($sql_prices);

// Close connection
$mysqli->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            text-align: center;
            margin-left: 20%;
            margin-right: 20%;
            background-color: #FFF2D7;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .action-links a {
            text-decoration: none;
            color: #007bff;
            margin-right: 5px;
        }

        .action-links a:hover {
            text-decoration: underline;
        }

        .contacts {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .contacts h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .contacts label {
            display: block;
            margin-bottom: 5px;
        }

        .contacts input[type="text"],
        .contacts input[type="email"],
        .contacts textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        .contacts textarea {
            height: 100px;
        }

        .contacts input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .contacts input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .edit-link,
        .delete-link {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            color: #fff;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .edit-link {
            background-color: #28a745;
        }

        .delete-link {
            background-color: #dc3545;
        }

        .edit-link:hover,
        .delete-link:hover {
            background-color: darken(currentColor, 10%);
        }

        .add-new-link {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            color: #fff;
            border-radius: 4px;
            background-color: #6f42c1;
            transition: background-color 0.3s ease;
        }

        .add-new-link:hover {
            background-color: darken(#6f42c1, 10%);
        }

        .logout-link {
            margin-top: -8%;
            margin-right: -30%;
            padding: 8px 16px;
            text-decoration: none;
            color: #fff;
            border-radius: 4px;
            background-color: #007bff;
            transition: background-color 0.3s ease;
            float: right;
        }

        .logout-link:hover {
            background-color: #0056b3;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin: 20px auto;
            text-align: left;
        }

        .form-container label {
            display: block;
            margin-bottom: 10px;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container textarea {
            resize: vertical;
            height: 100px;
        }

        .form-container input[type="submit"] {
            background-color: #800080;
            padding: 10px 20px;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #6a006a;
        }
    </style>
</head>

<body>
    <h1>ADMIN DASHBOARD</h1>
    <a href="logout.php" class="logout-link">Logout</a>
    <br>
    <h2>Contact Form Submissions</h2>

<!-- Search Form -->
    <form method="GET" action="admin_dashboard.php">
        <input type="text" name="search" placeholder="Search by ID, Name, Phone, Email">
        <input type="submit" value="Search">
    </form>

    <!-- Display contact form submissions -->
    <h2>Contact Form Submissions</h2>
    <?php
    if ($result_contact->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Phone</th><th>Email</th><th>Message</th></tr>";
        while ($row = $result_contact->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['message']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No submissions found.";
    }
    ?>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Name</th><th>Phone</th><th>Email</th><th>Message</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['message'] . "</td>";
            echo "<td><a href='delete_submission.php?id=" . $row['id'] . "' class='delete-link'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No submissions found.";
    }

    if ($result_prices->num_rows > 0) {
        echo "<h2>Service Prices</h2>";
        echo "<table>";
        echo "<tr><th>Service Name</th><th>Price</th><th>Action</th></tr>";
        while ($row = $result_prices->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['service_name'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td><a href='?delete_id=" . $row['id'] . "' class='delete-link'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No prices found.";
    }
    ?>

    <!-- Add New Price Form -->
    <div class="form-container">
        <h2>Edit Price</h2>
        <form method="post" action="">
            <label for="service_name">Service Name:</label>
            <input type="text" id="service_name" name="service_name" required>

            <label for="price">Price:</label>
            <input type="text" id="price" name="price" required>

            <input type="submit" name="add_price" value="Add Price">
        </form>
    </div>

   
</body>

</html>