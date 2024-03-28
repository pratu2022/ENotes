<?php
session_start();
$name = $_SESSION['name'];
include_once("../connect.php");
if(@$_GET['q']== 'quizre' && @$_GET['step']== 25 ) {
    $eid=@$_GET['eid'];
    $n=@$_GET['n'];
    $t=@$_GET['t'];
    $q=mysqli_query($mysql,"SELECT score FROM history WHERE eid='$eid' AND name='$name'" )or die('Error156');
    while($row=mysqli_fetch_array($q) )
    {
    $s=$row['score'];
    }
    $q=mysqli_query($mysql,"DELETE FROM `history` WHERE eid='$eid' AND name='$name' " )or die('Error184');
    $q=mysqli_query($mysql,"SELECT * FROM rank WHERE name='$name'" )or die('Error161');
    while($row=mysqli_fetch_array($q) )
    {
    $sun=$row['score'];
    }
    $sun=$sun-$s;
    $q=mysqli_query($mysql,"UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE name= '$name'")or die('Error174');
    //("location:addQues.php?q=quiz&step=2&eid=$eid&n=1&t=$t");
    header("location:start.php?q=quiz&step=2&eid=$eid&n=1&t=$t");
    // addQues.php?q=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'
    }
?>