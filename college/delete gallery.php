<?php
include("connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM gallery WHERE gallery_id = '".$_GET['gallery_del']."'");
header("location:all gallery.php");  

?>
