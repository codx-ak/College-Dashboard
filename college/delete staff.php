<?php
include("connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM staff WHERE staff_id = '".$_GET['staff_del']."'");
header("location:all staff.php");  

?>
