<?php
include('../connect.php');
if(@$_GET['q']== 'rmquiz') {
$eid=@$_GET['eid'];
$result = mysqli_query($mysql,"SELECT * FROM questions WHERE eid='$eid' ") or die('Error1');
while($row = mysqli_fetch_array($result)) {
	$qid = $row['qid'];
$r1 = mysqli_query($mysql,"DELETE FROM options WHERE qid='$qid'") or die('Error2');
$r2 = mysqli_query($mysql,"DELETE FROM answer WHERE qid='$qid' ") or die('Error3');
}
$r3 = mysqli_query($mysql,"DELETE FROM questions WHERE eid='$eid' ") or die('Error4');
$r4 = mysqli_query($mysql,"DELETE FROM tblquiz WHERE eid='$eid' ") or die('Error5');
$r4 = mysqli_query($mysql,"DELETE FROM history WHERE eid='$eid' ") or die('Error6');

header("location:Quiz.php?q=5");
}
?>