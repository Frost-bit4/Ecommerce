<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "store");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $newUsername = $_POST['new_username'];
    $newPassword = $_POST['new_password'];
    $contact = $_POST['contact'];


    $sql = "INSERT INTO `admin` (`username`, `password`, `contact`) VALUES ('$newUsername', '$newPassword', '$contact')";

    if ($conn->query($sql) === true) {
        echo "Registration successful. You can now log in.";
    } else {
        echo "Registration failed. Please try again.";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    
    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    
    $sql = "SELECT * FROM `admin` WHERE `username` = '$enteredUsername'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];

        if ($enteredPassword== $storedPassword) {
            
            $_SESSION['username'] = $enteredUsername;
            header("Location: admin_dashboard.php"); 
            exit();
        } else {

            echo "Incorrect password. Please try again.";
        }
    } else {
        
        echo "User not found. Please check your username.";
    }
}


$conn->close();
?>
