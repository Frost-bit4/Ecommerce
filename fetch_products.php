<?php
// Database connection (Replace with your actual database connection code)
$conn = mysqli_connect("localhost", "root", "", "store");

// Check for database connection errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve products from the database
$sql = "SELECT * FROM `products`";
$result = mysqli_query($conn, $sql);

$products = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
}

// Close the database connection
mysqli_close($conn);

// Return products as JSON
echo json_encode($products);
?>
