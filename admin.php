<?php
include("dbconnection.php");
$sql = "SELECT COUNT(*) as total_students FROM student";
$result = $data->query($sql);

if ($result->num_rows > 0) {
    // Fetch the result
    $row = $result->fetch_assoc();
    $totalStudents = $row["total_students"];
}else{
    $totalStudents = 0;
}
?>
<?php
include("dbconnection.php");
$sql = "SELECT class FROM student";
$result = $data->query($sql);

if ($result->num_rows > 0) {
    // Fetch the result
    $row = $result->fetch_assoc();
    $class = $row["class"];
}else{
    $totalStudents = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advisor Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-image: url('u.jpg'); /* Replace 'your-background-image.jpg' with your image file path */
            background-size: cover;
            background-position: center fixed;
        }

        header {
            background-color: skyblue; /* Blue */
            color: black;
            padding: 5px;
            text-align: justify;
            font-size: 30px;
            font-weight: 700;
            width: 100%;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.5);
        }

        .dash {
            text-decoration: none;
            color: white;
            font-size: 30px;
            font-weight: bold;
        }

        .logout {
            float: right;
            margin-top: 1px;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white */
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.2);
        }

        .btn-container {
            text-align: center;
            color: black;
            padding: 20px;
        }

        .box-container {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
            padding: 5px;
            text-align: center;
        }

        .info-box {
            background-color: turquoise; /* Red */
            color: black;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .info-box p {
            margin: 5px 0;
            font-size: 18px;
        }

        .btn-group {
            margin-top: 20px;
            left: 20%;
        }

        .btn {
            font-size: 20px;
            margin: 7px;
            padding: 15px 30px;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #2ecc71;
            color: white;
        }

        .btn-success {
            background-color: #2ecc71;
            color: white;
        }

        .btn-info {
            background-color: #2ecc71;
            color: white;
        }

        .btn-warning {
            background-color: #2ecc71;
            color: white;
        }

        .class-details,
        .schedules {
            background-color: white; /* Blue */
            color: black;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            margin-top: 20px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<header class="header">
    Advisor Dashboard
    <div class="logout">
        <a href="index.php" class="btn btn-primary">Home</a>
    </div>
    <div class="logout">
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</header>

<div class="container">
    <div class="btn-container">
    <h1 class="class-details">Class Details</h1>
        <div class="box-container">
            <div class="info-box">
                <p>Total Students</p>
                <h2><?php echo $totalStudents; ?></h2>
            </div>
            <div class="info-box">
                <p>Class</p>
                <h2><?php echo $class; ?></h2>
            </div>
        </div>
        
        
        <h1 class="schedules">Details And Schedules</h1>
       
    </div>

    <div class="btn-group">
        <a href="viewstudents.php" class="btn btn-primary">Student Details</a>
        <a href="addstudents.php" class="btn btn-success">Add Students</a>
        <a href="remedial.php" class="btn btn-info">Schedule Remedial</a>
        <a href="viewattendance.php" class="btn btn-warning">Attendance Details</a>
    </div>
</div>

<!-- Include Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
