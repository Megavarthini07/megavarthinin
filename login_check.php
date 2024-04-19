<?php
error_reporting(0);
session_start();
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
        $message = "Username or password is incorrect";
        $_SESSION['loginMessage'] = $message;
        header("location: login.php");
        exit(); // Ensure no further code execution after redirection
    }
}
?>
