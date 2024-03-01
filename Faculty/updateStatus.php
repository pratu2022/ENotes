<?php 
session_start();
include('../connect.php');

$uid = $_SESSION['uid'];

$time = time() + 10;

mysqli_query($mysql,"UPDATE tblfaculty set time = '$time' WHERE id = '$uid'")
?>