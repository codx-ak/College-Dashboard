<?php
include("connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM contact WHERE contact_id = '".$_GET['feedback_del']."'");
header("location:all feedback.php");  

?>
