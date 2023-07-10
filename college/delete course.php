<?php
include("connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM course WHERE course_id = '".$_GET['course_del']."'");
header("location:all course.php");  

?>
