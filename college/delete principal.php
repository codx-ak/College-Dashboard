<?php
include("connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM principal WHERE p_id = '".$_GET['p_del']."'");
header("location:all principal.php");  

?>
