<?php
session_start();

// Establish database connection (consider using environment variables)
$servername = "localhost";
$username = "root";
$password = ""; // Replace with a secure password
$dbname = "new";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement with parameterized query to prevent SQL injection
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);

// **Sanitize user input** to prevent malicious code injection
$username_input = filter_input(INPUT_POST, 'username');

if (!$stmt) {
  echo "SQL statement preparation failed: " . $conn->error;
  exit;
}

// Bind parameters securely
$stmt->bind_param("s", $username_input);

// Execute the statement
$stmt->execute();

$result = $stmt->get_result();

// Check if user exists and password matches
if ($result->num_rows == 1) {
  $row = $result->fetch_assoc();

  // **Verify password hash** (assuming passwords are hashed in the database)
  if (password_verify($password_input, $row['password'])) {
    // Authentication successful, set session variables
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username_input;
    // Redirect to admin dashboard
    header("Location: admin_dashboard.php");
    exit;
  } else {
    // Password incorrect, redirect with a generic error message
    $_SESSION['login_error'] = "Invalid login credentials";
    header("Location: login.php");
    exit;
  }
} else {
  // User does not exist, redirect with a generic error message (avoid revealing username existence)
  $_SESSION['login_error'] = "Invalid login credentials";
  header("Location: login.php");
  exit;
}

// Close the statement and connection (good practice)


?>