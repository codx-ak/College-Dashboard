<?php
include("connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM news WHERE news_id = '".$_GET['news_del']."'");
header("location:all news.php");  

?>
