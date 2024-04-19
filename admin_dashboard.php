<!-- admin_sidebar.php -->
<aside class="sidebar" style="background-color:#87cefa;"> <!-- Light gray background color -->
    <div class="sidebar-header">
        <div class="header-content">
            <h1>Advisor Dashboard</h1>
            <div class="btn-wrapper">
                <a href="admin.php" class="btn btn-primary">Back</a>
                <a href="viewstudents.php" class="btn btn-primary">Student Details</a>
                <a href="addstudents.php" class="btn btn-primary">Add Students</a>
                <a href="remedial.php" class="btn btn-primary">Schedule Remedial</a>
                <a href="viewattendance.php" class="btn btn-primary">Attendance Details</a>
            </div>
        </div>
    </div>
</aside>

<style>
    .btn-wrapper {
        float: right;
        margin-top: 5px;
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

