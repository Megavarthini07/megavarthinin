<?php
include("admin_dashboard.php");
include("admin_css.php");

include("dbconnection.php");


$fetchAttendance = "SELECT * FROM attendance a
                    JOIN student s ON a.student_id = s.student_id";
$result = mysqli_query($data, $fetchAttendance);


$notificationMessage = '';
$notificationStyle = '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Attendance</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            background-image: url('u.jpg'); 
            background-size: cover;
            background-position: center fixed;
        
        }

        .container {
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 10px;
            overflow: hidden;
        }

        table, th, td {
            border: 1px solid #dee2e6;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        .notification {
            margin-top: 20px;
        }

        .no-records {
            margin-top: 20px;
            text-align: center;
            color: #777;
        }
    </style>
</head>

<body>

<div class="container">
    <h2 class="text-center mb-4">Attendance Records</h2>
    <?php if (!empty($notificationMessage)) : ?>
        <div class="alert alert-<?php echo $notificationStyle; ?> notification" role="alert">
            <?php echo $notificationMessage; ?>
        </div>
    <?php endif; ?>

    <?php if (mysqli_num_rows($result) > 0) : ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Remedial ID</th>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?php echo $row['remedial_id']; ?></td>
                            <td><?php echo $row['student_id']; ?></td>
                            <td><?php echo $row['student_name']; ?></td>
                            <td><?php echo $row['attendance_1']; ?></td>
                            <td><?php echo ucfirst($row['status']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <p class="no-records">No attendance records found.</p>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
