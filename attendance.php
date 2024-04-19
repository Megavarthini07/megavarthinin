<?php
include("user_dashboard.php");
include("admin_css.php");


include("dbconnection.php");


$notificationMessage = '';
$notificationStyle = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  
    $studentId = $_POST['student_id'];
    $date = $_POST['date'];
    $status = $_POST['status'];

   
    $fetchStudentDetails = "SELECT * FROM student WHERE student_id = '$studentId'";
    $result = mysqli_query($data, $fetchStudentDetails);

    if ($result && mysqli_num_rows($result) > 0) {
        $studentDetails = mysqli_fetch_assoc($result);
        $studentName = $studentDetails['student_id'];

      
        $insertAttendance = "INSERT INTO attendance (remedial_id,student_id,attendance_1, status) 
                             VALUES ('$studentId', '$studentName', '$date', '$status')";
        $insertResult = mysqli_query($data, $insertAttendance);

        if ($insertResult) {
            $notificationMessage = 'Attendance recorded successfully';
            $notificationStyle = 'success';
        } else {
            $notificationMessage = 'Failed to record attendance';
            $notificationStyle = 'danger';
        }
    } else {
        $notificationMessage = 'Student not found';
        $notificationStyle = 'danger';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            background-image: url('b4.jpg');
            background-size: cover;
            background-position: center fixed;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
        }

        input, select {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }

        button:hover {
            background-color: #2980b9;
        }

        .notification {
            margin-top: 20px;
        }
    </style>
</head>

<body>

<div class="container">
    <h2 class="text-center mb-4">Attendance Form</h2>
    <?php if (!empty($notificationMessage)) : ?>
        <div class="alert alert-<?php echo $notificationStyle; ?> notification" role="alert">
            <?php echo $notificationMessage; ?>
        </div>
    <?php endif; ?>
    <form action="#" method="POST">
    <div class="form-group">
            <label for="student_id">Remedial ID:</label>
            <input type="text" id="remedial_id" name="remedial_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="student_id">Student ID:</label>
            <input type="text" id="student_id" name="student_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status" class="form-control" required>
                <option value="present">Present</option>
                <option value="absent">Absent</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit Attendance</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>
