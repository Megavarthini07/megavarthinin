<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "performance";





$data = mysqli_connect($host, $user, $password, $db);
$sql = "SELECT * from student";
$result = mysqli_query($data, $sql);
include "admin_dashboard.php"
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
           
            margin: 0;
            padding: 0;
            background-image: url('u.jpg'); 
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
    <h1 class="text-center">Student Details</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($info = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $info['student_id']; ?></td>
                        <td><?php echo $info['student_name']; ?></td>
                        <td><?php echo $info['class']; ?></td>
                        <td>
                            <a class='btn btn-sm btn-danger' href='delete.php?studentid=<?php echo $info['student_id']; ?>'>Delete</a>
                        </td>
                        <td>
                            <a class='btn btn-primary' href='update.php?studentid=<?php echo $info['student_id']; ?>'>Update</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</div>
        <div class="btn-container">
            <button class="btn btn-primary" onclick="window.location.href='addstudents.php'">Add Student</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
