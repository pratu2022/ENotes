<?php 
session_start();
include('../connect.php');

$uid = $_SESSION['uid'];
echo $uid;

$time = time() + 10;

mysqli_query($mysql,"UPDATE tblstudent set time = '$time' WHERE id = '$uid'");
?>