<?php
// Start session
session_start();

// Check if user is already logged in, redirect to admin dashboard if logged in
if(isset($_SESSION['user_id'])) {
    header("Location: admin_dashboard.php");
    exit;
}

// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Get input values from form
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate input
    if(empty($username) || empty($password)) {
        $error = "Please enter both username and password.";
    } else {
        // Prepare and execute SQL query to check user credentials
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        if($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $param_username);
            $param_username = $username;

            if($stmt->execute()) {
                $stmt->store_result();
                if($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $username, $hashed_password);
                    if($stmt->fetch()) {
                        // Verify password
                        if($password === "password10") { // Use your actual password here
                            // Password is correct, start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["user_id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to admin dashboard
                            header("Location: admin_dashboard.php");
                        } else {
                            $error = "Invalid username or password.";
                        }
                    }
                } else {
                    $error = "Invalid username or password.";
                }
            } else {
                $error = "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #F3D0D7;
    margin: 10% 10% 10% 10%;
    text-align: center;
}

.login-container {
    width: 300px;
    margin: 100px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

h2 {
    margin-bottom: 20px;
    color: #333;
}

.input-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #666;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.login-button {
    background-color: #4CAF50;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.login-button:hover {
    background-color: #45a049;
}

.error-message {
    color: #ff0000;
    margin-bottom: 10px;
}
</style>

<body>
    <div class="login-container">

        <h2>Login</h2>
        <?php
    // Display error message if any
    if(isset($error)) {
        echo "<p>{$error}</p>";
    }
    ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
</body>
</div>

</html>