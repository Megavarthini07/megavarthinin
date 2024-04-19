<?php
session_start();

error_reporting(0);

$host = "localhost";
$user = "root";
$password = "";
$db = "performance";
$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE name = '" . $username . "' AND password = '" . $password . "'";
    $result = mysqli_query($data, $sql);
    $row = mysqli_fetch_array($result);

    if ($row) {
        if ($row["password"] == 'admin') {
            $_SESSION["username"] = $username;
            header("location: admin.php");
            exit(); // Ensure no further code execution after redirection
        } else if ($row["password"] == 'user') {
            $_SESSION["username"] = $username;
            header("location: user.php");
            exit(); // Ensure no further code execution after redirection
        }
    } else {
        $message = "Invalid username or password. Please try again.";
        $_SESSION['loginMessage'] = $message;
        header("location: login.php");
        exit(); // Ensure no further code execution after redirection
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('c.jpg') center/cover fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            width: 320px;
            padding: 40px;
            background-color: #fff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            border-radius: 5px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            color: #888;
        }

        input {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .link {
            margin-top: 20px;
            font-size: 14px;
            color: #888;
        }

        .link a {
            color: #3498db;
            text-decoration: none;
        }
        .error-message {
            color: #ff0000;
            margin-bottom: 15px;
        }
        .notification {
            display: none;
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #ff0000;
            color: #fff;
            padding: 15px;
            border-radius: 5px;
            z-index: 9999;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login</h2>
    <form action ="login_check.php" method="POST"class="login_form">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($result) && mysqli_num_rows($result) == 0) {
                echo '<div class="error-message">Invalid username or password. Please try again.</div>';
            }else if (isset($_SESSION['loginMessage'])) {
                echo '<div class="error-message">' . $_SESSION['loginMessage'] . '</div>';
                unset($_SESSION['loginMessage']); // Clear the login message once displayed
            }
        ?>
        <input type="submit" value="Login">
    </form>
    
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#loginForm').submit(function (e) {
            e.preventDefault();
            alert('Form submitted');
            
        });
    });
   
    window.onload = function() {
        var notification = document.getElementById('notification');
        if (notification) {
            notification.style.display = 'block';

            // Hide the notification after a few seconds (adjust the timeout as needed)
            setTimeout(function() {
                notification.style.display = 'none';
            }, 5000);
        }
    };
</script>

</body>
</html>
