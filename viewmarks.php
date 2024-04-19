<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Marks</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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

        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2181b5;
            border-color: #2181b5;
        }
  
    </style>
</head>
<body>

<?php
    include("dbconnection.php");
    include("user_dashboard.php");
    include("admin_css.php");
?>

<div>
    <div class="container mt-4">
        <form method="POST" action="viewmarks.php">
            <div class="row mb-3">
            <h1 >Select Marks</h1>
                <div class="col-md-3">
                    <div class="form-group">
                        
                        <label class="control-label">Choose Below/Above Average</label>
                        <select class="form-control" name="average">
                            <option value="all">All</option>
                            <option value="below">Below Average</option>
                            <option value="above">Above Average</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Subject</label>
                        <select class="form-control" name="subject">
                            <option>Select</option>
                            <?php
                            $query = "SELECT * FROM subjects";
                            $result = mysqli_query($data, $query) or die('error');
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['subject_id'] . '">' . $row['subject_name'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Test</label>
                        <select class="form-control" name="test">
                            <option>Select</option>
                            <?php
                            $query = "SELECT * FROM tests";
                            $result = mysqli_query($data, $query) or die('error');
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['test_id'] . '">' . $row['test_name'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mt-4">
                        <input type="submit" name="submit" class="btn btn-primary" id="submit" value="Submit">
                    </div>
                </div>
            </div>
        </form>


        
        <div>
        
        <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">CLASS</th>
                        <th scope="col">SUBJECT</th>
                        <th scope="col">TEST</th>
                        <th scope="col">MARK</th>
                    </tr>
                </thead>
              
                <tbody>
                    <?php
                        $limit = 8;
                        $getQuery = 'SELECT * FROM marks';
                        $result = mysqli_query($data, $getQuery);
                        $total_rows = mysqli_num_rows($result);
                        $total_pages = ceil($total_rows / $limit);
                        if (!isset($_GET['page'])) {
                            $page_number = 1;
                        } else {
                            $page_number = $_GET['page'];
                        }
                        $initial_page = ($page_number - 1) * $limit;
                        
                        if (!isset($_POST['submit'])) {
                            $getQuery = "SELECT s.student_id,
                                s.student_name,
                                s.class,
                                sub.subject_name,
                                t.test_name,
                                m.mark_1
                                FROM marks m
                                JOIN student s ON m.student_id = s.student_id
                                JOIN subjects sub ON m.subject_id = sub.subject_id
                                JOIN tests t ON m.test_id = t.test_id
                                ORDER BY s.student_id";
                            getData($getQuery);
                        } else if (isset($_POST['submit']) && isset($_POST['subject']) && isset($_POST['test']) && isset($_POST['average'])) {
                            $subject = $_POST['subject'];
                            $test = $_POST['test'];
                            $average = $_POST['average'];
                            if ($average === 'below') {
                                $condition = 'AND m.mark_1 <= 50';
                            } else if ($average === 'above') {
                                $condition = 'AND m.mark_1 > 50';
                            } else {
                                $condition = '';
                            }
                            $getQuery = "SELECT s.student_id,
                                s.student_name,
                                s.class,
                                sub.subject_name,
                                t.test_name,
                                m.mark_1
                                FROM marks m
                                JOIN student s ON m.student_id = s.student_id
                                JOIN subjects sub ON m.subject_id = sub.subject_id
                                JOIN tests t ON m.test_id = t.test_id
                                WHERE sub.subject_id = '$subject'
                                AND t.test_id = '$test'
                                $condition ORDER BY s.student_id ";
                            getData($getQuery);
                        }
                        ?>
                </tbody>
            </table>
        </div>

        
        </div>

<?php

echo '<div class="mt-4">';
echo '<form method="POST" action="pdfgeneration.php">';
echo '<input type="hidden" name="getQuery" value="' . base64_encode($getQuery) . '">';
echo '<button type="submit" class="btn btn-primary">Generate PDF</button>';
echo '</form>';
echo '</div>';
?>
</div>
    </div>


</body>
</html>

<?php

function getData($sql) {
    include('dbconnection.php');
    $result = mysqli_query($data, $sql);
    if (!$result) {
        die(mysqli_error($data));  // Add this line to display any SQL errors
    }
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
                <td>' . $row['student_id'] . '</td>
                <td>' . $row['student_name'] . '</td>
                <td>' . $row['class'] . '</td>
                <td>' . $row['subject_name'] . '</td>
                <td>' . $row['test_name'] . '</td>
                <td>' . $row['mark_1'] . '</td>
                </tr>';
        }
    }
}
?>
