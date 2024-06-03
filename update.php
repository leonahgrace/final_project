<?php
// Database connection parameters
$servername = 'localhost';
$dbname = 'ne';
$username = 'root';
$password = '';

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if the form was submitted with the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize inputs
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $message = mysqli_real_escape_string($connection, $_POST['message']);

    // Prepare UPDATE statement with placeholders
    $sql = "UPDATE submit SET name=?, phone=?, email=?, message=? WHERE id=?";

    // Prepare and bind parameters
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssssi", $name, $phone, $email, $message, $id);

    // Execute the UPDATE statement
    if ($stmt->execute()) {
        // Redirect to VIEW.php after successful update
        header("Location: VIEW.php");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .container h2 {
            margin-bottom: 20px;
        }
        .container label {
            display: block;
            margin-bottom: 5px;
        }
        .container input[type="text"], 
        .container input[type="email"],
        .container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .container textarea {
            resize: vertical;
            height: 100px;
        }
        .container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }
        .container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Record</h2>
        <form method="POST" action="update.php">
            <label for="id">ID</label>
            <input type="text" id="id" name="id" required>

            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>

            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message</label>
            <textarea id="message" name="message" required></textarea>

            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>