<?php
$host="localhost";
$user="root";
$password="";
$db ="performance";

$data=mysqli_connect($host,$user,$password,$db);


 if($_GET['studentid'])
 {
    $student_id=$_GET['studentid'];
    $sql="DELETE FROM student WHERE student_id='$student_id'";
    $result = mysqli_query($data,$sql);

    if($result)
    {
        header("location:viewstudents.php");
    }
 }

?>