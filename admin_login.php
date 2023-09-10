<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> 
    <title>Admin Login - SuperCommerce</title>
</head>
<style>
    
    .login-container {
        max-width: 400px;
        margin: 0 auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    .login-container h2 {
        font-size: 1.5rem;
        margin-bottom: 20px;
    }

    /* Style form elements */
    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }
    .btn {
        background-color: #ff4500;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 4px;
        font-weight: bold;
        text-transform: uppercase;
        transition: background-color 0.3s ease-in-out;
    }

    .btn:hover {
        background-color: #ff5722;
    }

    
    #registration-section {
        display: none;
    }
</style>
<body>
    <header class="top-bar">
        <div class="brand">
            <h1>SuperCommerce</h1>
        </div>
        <div class="buttons">
            
            <button class="btn"><a href='index.html' class="link">Home</a></button>
            <button class="btn"><a href='products.html' class="link">Products</a></button>
            <button class="btn">Cart</button>
            <button class='btn'><a href = 'admin_login.php' class="link">Admin</a></button>
    </header>

    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="admin_register.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn" name='login'>Login</button>
        </form><br> or 
        
        <button class="btn" id="register-btn">Register</button>
        
        <div id="registration-section">
            <br>    <h2>Admin Registration</h2>
            <form action="admin_register.php" method="POST">
                <div class="form-group">
                    <label for="new_username">New Username:</label>
                    <input type="text" id="new_username" name="new_username" required>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password:</label>
                    <input type="password" id="new_password" name="new_password" required>
                </div>
                <div class="form-group">
                    <label for="contact">Contact:</label>
                    <input type="text" id="contact" name="contact" required>
                </div>
                <button type="submit" class="btn" name='register'>Register</button>
            </form>
        </div>
    </div>

    
    <script>
        document.getElementById("register-btn").addEventListener("click", function() {
            var registrationSection = document.getElementById("registration-section");
            registrationSection.style.display = "block"; 
        });
    </script>
</body>
</html>
