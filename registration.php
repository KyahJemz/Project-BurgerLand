<?php 
    include './php/config.php';
    include './php/database.php';
    include './php/auth-0.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['registerBtn'])) {
            $result = CreateAccount($_POST['name'],$_POST['address'],$_POST['username'],$_POST['password'],$_POST['confirmPassword'],$Connection);
            if ($result[0]){
                setUser($_POST['username'],$_POST['password']);
                header('Location: ./pages/home.php');
                exit;
            } else {
                echo '<script>';
                echo 'alert("' . $result[1] . '")';
                echo '</script>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Registration - Burger Land</title>

    <style>
   
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('./images/background-2.jpg');
        }

        .login-container {
            background-color: #f9f9f9d7;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
            width: 350px;
        }

        .login-header h1 {
            color: #e74c3c;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .login-form h2 {
            margin: 0;
            color: #333;
        }

        .form-group {
            text-align: left;
            margin-bottom: 5px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #e74c3c;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #d64131;
        }

    </style>

</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Welcome to Burger Land</h1>
        </div>
        <div class="login-form">
            <h2>Register</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="address">Complete Address:</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password:</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required>
                </div>
                <button name="registerBtn" type="submit">Register</button>
                <p><a class="link" href="./index.php">Login?</a></p>
            </form>
        </div>
    </div>
</body>
</html>
