<?php
error_reporting(0);
$host = "localhost";
$user = "root";
$password = "";
$db = "performance";

$data = mysqli_connect($host, $user, $password, $db);

// Define variables to store notification messages and their styles
$notificationMessage = '';
$notificationStyle = '';

if (isset($_POST['add_student'])) {
    $studentid = $_POST['student_id'];
    $studentname = $_POST['student_name'];
    $class = $_POST['class'];

    $check = "SELECT * FROM student WHERE student_id='$student_id'";
    $check_user = mysqli_query($data, $check);
    $row_count = mysqli_num_rows($check_user);

    if ($row_count == 1) {
        $notificationMessage = 'Student ID already exists.';
        $notificationStyle = 'danger';
    } else {
        $sql = "INSERT INTO student(student_id, student_name, class) VALUES ('$studentid','$studentname','$class')";
        $result = mysqli_query($data, $sql);

        if ($result) {
            $notificationMessage = 'Data uploaded successfully';
            $notificationStyle = 'success';
        } else {
            $notificationMessage = 'Upload failed';
            $notificationStyle = 'danger';
        }
    }
}
include("admin_dashboard.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advisor Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style type="text/css">
        body {
            background-color: #f5f5f5;
            font-family: 'Arial', sans-serif;
            background-image: url('u.jpg'); /* Replace 'your-background-image.jpg' with your image file path */
            background-size: cover;
            background-position: center fixed;
        }

        .content {
            margin: 50px auto;
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: inline-block;
            width: 100px;
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-container {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <h1 class="text-center">Add Student Details</h1>
        <?php if (!empty($notificationMessage)) : ?>
            <div class="alert alert-<?php echo $notificationStyle; ?>" role="alert">
                <?php echo $notificationMessage; ?>
            </div>
        <?php endif; ?>
        <form action="#" method="POST" id="studentForm">
            <div class="form-group">
                <label for="student_id">ID</label>
                <input type="number" name="student_id" id="student_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="student_name">Name</label>
                <input type="text" name="student_name" id="student_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <input type="text" name="class" id="class" class="form-control" required>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn btn-primary" name="add_student">Add Student</button>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    // Simple form validation using JavaScript
    document.getElementById('studentForm').addEventListener('submit', function (event) {
        var studentId = document.getElementById('student_id').value;
        var studentName = document.getElementById('student_name').value;
        var studentClass = document.getElementById('class').value;

        if (!studentId || !studentName || !studentClass) {
            alert('All fields are required!');
            event.preventDefault();
        }
    });
</script>
</body>
</html>
