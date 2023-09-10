<?php
session_start();

// Check if the user is logged in (authenticated as an admin)
if (!isset($_SESSION['username'])) {
    header("Location: admin_login.php"); // Redirect to the login page if not logged in
    exit();
}

// Database connection (Replace with your actual database connection code)
$conn = mysqli_connect("localhost", "root", "", "store");

// Check if the "Add Product" form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_product'])) {
    $productName = $_POST['product_name'];
    $productDescription = $_POST['product_description'];
    // You can add more product details here

    // Perform the product addition to the database (without specifying product_id)
    $sql = "INSERT INTO `products` (`product_name`, `product_description`) VALUES ('$productName', '$productDescription')";

    if ($conn->query($sql) === true) {
        echo "Product added successfully.";
    } else {
        echo "Product addition failed. Please try again.";
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_product'])) {
    $productId = $_POST['product_id'];
    $newProductName = $_POST['new_product_name'];
    $newProductDescription = $_POST['new_product_description'];

    // Perform the product update in the database
    $sql = "UPDATE `products` SET `product_name` = '$newProductName', `product_description` = '$newProductDescription' WHERE `product_id` = $productId";

    if ($conn->query($sql) === true) {
        echo "Product updated successfully.";
    } else {
        echo "Product update failed. Please try again.";
    }
}

// Check if the "Remove Product" form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_product'])) {
    $productId = $_POST['product_id'];

    // Perform the product removal from the database
    $sql = "DELETE FROM `products` WHERE `product_id` = $productId";

    if ($conn->query($sql) === true) {
        echo "Product removed successfully.";
    } else {
        echo "Product removal failed. Please try again.";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> <!-- Replace with your actual stylesheet -->
    <title>Admin Dashboard - SuperCommerce</title>
    <style>
        /* Add custom CSS for the admin dashboard here */
    </style>
</head>
<body>
    <header class="top-bar">
        <div class="brand">
            <h1>SuperCommerce</h1>
        </div>
        <div class="buttons">
            <!-- Add any additional top bar buttons as needed -->
            <button class="btn"><a href='index.html' class="link">Home</a></button>
            <button class="btn"><a href='products.html' class="link">Products</a></button>
            <button class="btn">Cart</button>
            <button class='btn'><a href = 'admin_login.php' class="link">Admin</a></button>
        </div>
    </header>

    <div class="container">
        <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>

        <!-- Add Product Form (without image) -->
        <h3>Add Product</h3>
        <form action="" method="POST">
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" required><br><br>
            
            <label for="product_description">Product Description:</label>
            <textarea id="product_description" name="product_description" rows="3" maxlength="500" required></textarea>
            
            <button type="submit" name="add_product" class="btn">Add Product</button>
        </form>
        <!-- Update Product Form -->
<h3>Update Product</h3>
<form action="" method="POST">
    <label for="product_id">Product ID:</label>
    <input type="text" id="product_id" name="product_id" required><br><br>
    
    <label for="new_product_name">New Product Name:</label>
    <input type="text" id="new_product_name" name="new_product_name" required><br><br>
    
    <label for="new_product_description">New Product Description:</label>
    <textarea id="new_product_description" name="new_product_description" rows="3" maxlength="500" required></textarea>
    
    <button type="submit" name="update_product" class="btn">Update Product</button>
</form>

        <!-- Remove Product Form -->
        <h3>Remove Product</h3>
        <form action="" method="POST">
            <label for="product_id">Product ID:</label>
            <input type="text" id="product_id" name="product_id" required>
            <button type="submit" name="remove_product" class="btn">Remove Product</button>
        </form>

        <!-- Add more dashboard options and functionality as needed -->
    </div>

    <h3>Products List</h3>
<table border="1">
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM `products`";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['product_id'] . "</td>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['product_description'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No products found.</td></tr>";
        }
        ?>
    </tbody>
</table>
</body>
</html>
