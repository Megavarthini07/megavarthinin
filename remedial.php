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
    $remedialId = $_POST['remedial_id'];
    $studentId = $_POST['student_id'];
    $testId = $_POST['test_id'];
    $subjectId = $_POST['subject_id'];
    $fromDate = $_POST['from_date'];
    $toDate = $_POST['to_date'];
    $startTime = $_POST['start_time'];
    $endTime = $_POST['end_time'];

    // Perform data validation if needed

    $sql = "INSERT INTO remedial(remedial_id,student_id,subject_id,test_id,from_date,to_date,start_time,end_time)
            VALUES ('$remedialId','$studentId','$subjectId', '$testId', '$fromDate', '$toDate', '$startTime', '$endTime')";
    
    $result = mysqli_query($data, $sql);

    if ($result) {
        $notificationMessage = 'Remedial class scheduled successfully';
        $notificationStyle = 'success';
    } else {
        $notificationMessage = 'Failed to schedule remedial class';
        $notificationStyle = 'danger';
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
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            transition: opacity 0.5s ease-in-out;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <h1 class="text-center">Schedule Remedial Class</h1>
        <?php if (!empty($notificationMessage)) : ?>
            <div class="alert alert-<?php echo $notificationStyle; ?>" role="alert">
                <?php echo $notificationMessage; ?>
            </div>
        <?php endif; ?>
        <form action="#" method="POST" id="remedialForm">
        <div class="form-group">
                <label for="remedial_id">Remedial ID</label>
                <input type="text" name="remedial_id" id="remedial_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="student_id">Student ID</label>
                <input type="number" name="student_id" id="student_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="student_name">Test</label>
                <input type="text" name="test_id" id="test_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="class">Subject</label>
                <input type="number" name="subject_id" id="subject_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="class">From Date</label>
                <input type="date" name="from_date" id="from_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="class">To Date</label>
                <input type="date" name="to_date" id="to_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="class">Start Time</label>
                <input type="time" name="start_time" id="start_time" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="class">End Time</label>
                <input type="time" name="end_time" id="end_time" class="form-control" required>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn btn-primary" name="add_student">Add Student</button>
            </div>
        </form>
    </div>
   
    <?php if (!empty($notificationMessage)) : ?>
        <div class="notification alert alert-<?php echo $notificationStyle; ?>" role="alert">
            <?php echo $notificationMessage; ?>
        </div>

        <script>
            // Hide the notification after 5 seconds (adjust as needed)
            setTimeout(function () {
                var notification = document.querySelector('.notification');
                notification.style.opacity = '0';
                setTimeout(function () {
                    notification.style.display = 'none';
                }, 500);
            }, 5000);
        </script>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    // Simple form validation using JavaScript
    document.getElementById('remedialForm').addEventListener('submit', function (event) {
        var remedialId = document.getElementById('remedial_id').value;
        var studentId = document.getElementById('student_id').value;
        var testId = document.getElementById('test_id').value;
        var subjectId = document.getElementById('subject_id').value;
        var fromDate = document.getElementById('from_date').value;
        var toDate = document.getElementById('to_date').value;
        var startTime = document.getElementById('start_time').value;
        var endTime = document.getElementById('end_time').value;
      
        if (!studentId || !testId || !subjectId || !fromDate || !toDate || !startTime || !endTime) {
            alert('All fields are required!');
            event.preventDefault();
        }
    });
</script>
</body>
</html>
