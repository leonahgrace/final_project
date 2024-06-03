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

// Check if ID is provided in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch item details from the database based on ID
    $sql = "SELECT id, service_name, price, image_data FROM prices WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Display the edit form with pre-filled data
        ?>
<form action="update_item.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label for="service_name">Service Name:</label>
    <input type="text" name="service_name" value="<?php echo htmlspecialchars($row['service_name']); ?>"><br>
    <label for="price">Price:</label>
    <input type="text" name="price" value="<?php echo htmlspecialchars($row['price']); ?>"><br>
    <!-- This allows users to upload an image -->

    <input type="submit" value="Update">
</form>

<?php
    } else {
        echo "Item not found.";
    }
} else {
    echo "ID not provided.";
}
?>