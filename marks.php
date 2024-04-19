<?php 
    include ("dbconnection.php");
    include ("admin_css.php");
    include ("user_dashboard.php");
 
include("dbconnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_marks'])) {
    $studentId = $_POST['student_id'];
    $subject = $_POST['subject_id'];
    $test = $_POST['test_id'];
    $mark = $_POST['mark_1'];


   
    $insertQuery = "INSERT INTO marks(student_id,subject_id, test_id, mark_1)
                    VALUES ('$studentId', '$subject', '$test','$mark')";

    $result = mysqli_query($data, $insertQuery);

    if ($result) {
        echo '<script>alert("Marks added successfully!");</script>';
    } else {
        echo $insertQuery;
    }
}
?>
      
         
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Dashboard</title>
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            background-image: url('b4.jpg'); /* Replace 'your-background-image.jpg' with your image file path */
            background-size: cover;
            background-position: center fixed;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: inline-block;
            width: 150px;
            margin-bottom: 10px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        h2 {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .btn-submit {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <center>
        <h2>Enter Student Details</h2>
        <form action="#" method="POST">
            <div class="input-group">
                <label for="student_id">Student ID</label>
                <input type="text" name="student_id" class="form-control">
            </div>
            <div class="input-group">
                <label for="subject_id">Subject ID</label>
                <input type="text" name="subject_id" class="form-control">
            </div>
            <h2>Enter Marks</h2>
             
            <div class="input-group">
                <label for="test_id">Test</label>
                <input type="text" name="test_id" class="form-control">
            </div>


            <div class="input-group">
                <label for="mark_1">Mark</label>
                <input type="number" name="mark_1" class="form-control">
            </div>

        

            <div class="input-group">
                <button type="submit" class="btn-submit" name="add_marks">Submit</button>
            </div>
        </form>
    </center>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
