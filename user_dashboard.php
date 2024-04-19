<!-- admin_sidebar.php -->
<aside class="sidebar" style="background-color: coral;"> <!-- Light gray background color -->
    <div class="sidebar-header">
        <div class="header-content">
            <h1>Faculty Dashboard</h1>
            <div class="btn-wrapper">
                <a href="user.php" class="btn btn-primary">Back</a>
                <a href="marks.php" class="btn btn-primary">Add Marks</a>
                <a href="viewmarks.php" class="btn btn-primary">Mark Details</a>
                <a href="viewremedial.php" class="btn btn-primary">Remedial Details</a>
                <a href="attendance.php" class="btn btn-primary">Remedial Attendance</a>
            </div>
        </div>
    </div>
</aside>

<style>
    .btn-wrapper {
        float: right;
        margin-top: 10px;
    }

    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.5);
    }

    .sidebar-header h1 {
        margin: 10; 
    }
</style>

