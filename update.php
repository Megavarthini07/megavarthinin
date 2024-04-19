<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "performance";

$data = mysqli_connect($host, $user, $password, $db);

// Initialize variables for notification
$notificationMessage = "";
$notificationClass = "";

// Check if studentid is provided in the URL
if (isset($_GET['studentid'])) {
    $student_id = $_GET['studentid'];

    // Fetch student information based on the provided student id
    $sql = "SELECT * FROM student WHERE student_id = $student_id";
    $result = mysqli_query($data, $sql);
    $info = mysqli_fetch_assoc($result);

    // Check if the student record exists
    if (!$info) {
        echo "Student record not found.";
        exit;
    }
} else {
    echo "Invalid request. Please provide a student ID.";
    exit;
}

// Handle form submission for updating student information
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and process the form data
    $new_name = mysqli_real_escape_string($data, $_POST['new_name']);
    $new_class = mysqli_real_escape_string($data, $_POST['new_class']);

    // Update the student record
    $update_sql = "UPDATE student SET student_name = '$new_name', class = '$new_class' WHERE student_id = $student_id";
    $update_result = mysqli_query($data, $update_sql);

    if ($update_result) {
        $notificationMessage = "Student information updated successfully.";
        $notificationClass = "alert-success";
        // You may redirect the user to the student details page or perform any other action.
    } else {
        $notificationMessage = "Error updating student information: " . mysqli_error($data);
        $notificationClass = "alert-danger";
    }
}

include "admin_dashboard.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "admin_css.php"; ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Update Student</title>
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url('u.jpg'); 
            background-size: cover;
            background-position: center fixed;
        }

        .content {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 50px auto;
            max-width: 600px;
        }

        h1 {
            color: #000;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Notification Styles */
        .notification {
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>

<body>
    <div class="content">
        <h1>Update Student Information</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="new_name">New Name:</label>
                <input type="text" class="form-control" id="new_name" name="new_name" value="<?php echo $info['student_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="new_class">New Class:</label>
                <input type="text" class="form-control" id="new_class" name="new_class" value="<?php echo $info['class']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Information</button>
        </form>

        <!-- Notification -->
        <?php if ($notificationMessage): ?>
            <div class="notification <?php echo $notificationClass; ?>">
                <?php echo $notificationMessage; ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
