<?php
include("dbconnection.php");


if(isset($_POST['submit'])){

 $sortsemester = $_POST['semester'];
 $sortsubjects =$_POST['subjects'];
 $sorttest =$_POST['test'];
 if ($data->connect_error) {
     die("Connection failed: " . $data->connect_error);
 }
 $sql = "SELECT * FROM marks WHERE semester ='$sortsemester',subjects='$sortsubjects',test='$sorttest'";
 $result = mysqli_query($data,$sql);
 if($result == true)
 {
    header("location: report1.php");
 }
}

?>
