<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "performance";





$data = mysqli_connect($host, $user, $password, $db);
$sql = "SELECT r.remedial_id,s.student_id,s.student_name,s.class,sub.subject_id,sub.subject_name,
r.from_date,r.to_date,r.start_time,r.end_time
FROM remedial r
JOIN student s ON r.student_id = s.student_id
JOIN subjects sub ON r.subject_id = sub.subject_id";

$result = mysqli_query($data, $sql);

include "user_dashboard.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include "admin_css.php"; ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Advisor Dashboard</title>
    <div class="content">
    
 
</div>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            background-image: url('b4.jpg'); /* Replace 'your-background-image.jpg' with your image file path */
            background-size: cover;
            background-position: center fixed;
        }
        .text-center{
            left:50%;
            margin-top:20px;
        }

        .content {
            margin: 20px;
            left:50%;
            margin-top:20px;
            padding:10;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            width: 120%;
            font-size: 18px;
         
            border-radius: 10px;
            overflow: hidden;
        }

        th,
        td {
            border: 1px solid black;
            padding: 20px;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        td {
            text-align: center;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            margin: 5px;
        }
    </style>
</head>

<body>
   <br>
    <div>
    
    <div class="content">
    <h1 class="text-center">Remedial Details</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Remedial ID</th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Student Class</th>
                    <th>Subject ID</th>
                    <th>Subject Name</th>
                    <th>From Date</th>
                    <th>To date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    
                
                    
                </tr>
            </thead>
            <tbody>
                <?php 
                 while ($info = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $info['remedial_id']; ?></td>
                        <td><?php echo $info['student_id']; ?></td>
                        <td><?php echo $info['student_name']; ?></td>
                        <td><?php echo $info['class']; ?></td>
                        <td><?php echo $info['subject_id']; ?></td>
                        <td><?php echo $info['subject_name']; ?></td>
                        <td><?php echo $info['from_date']; ?></td>
                        <td><?php echo $info['to_date']; ?></td>
                        <td><?php echo $info['start_time']; ?></td>
                        <td><?php echo $info['end_time']; ?></td>
                       
                      
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>

