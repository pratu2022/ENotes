<?php
$n = $_GET['n'];
$eid = $_GET['eid'];
include("../connect.php");
if(isset($_GET['n'])){
    for($i=1;$i<=@$_GET['n'];$i++){
        
        $qid = uniqid();
        $qns=$_POST['qns'.$i];
        $query = "INSERT INTO `questions`(`eid`, `qid`, `qns`, `choice`, `sn`) VALUES ('$eid','$qid','$qns','4','$i')";
        $query_run = mysqli_query($mysql,$query);
$oaid=uniqid();
$obid=uniqid();
$ocid=uniqid();
$odid=uniqid();
$a=$_POST[$i.'1'];
$b=$_POST[$i.'2'];
$c=$_POST[$i.'3'];
$d=$_POST[$i.'4'];
$qa=mysqli_query($mysql,"INSERT INTO options VALUES  ('$qid','$a','$oaid')") or die('Error61');
$qb=mysqli_query($mysql,"INSERT INTO options VALUES  ('$qid','$b','$obid')") or die('Error62');
$qc=mysqli_query($mysql,"INSERT INTO options VALUES  ('$qid','$c','$ocid')") or die('Error63');
$qd=mysqli_query($mysql,"INSERT INTO options VALUES  ('$qid','$d','$odid')") or die('Error64');
$e=$_POST['ans'.$i];
switch($e)
{
case 'a':
$ansid=$oaid;
break;
case 'b':
$ansid=$obid;
break;
case 'c':
$ansid=$ocid;
break;
case 'd':
$ansid=$odid;
break;
default:
$ansid=$oaid;
}  

$qans=mysqli_query($mysql,"INSERT INTO answer VALUES  ('$qid','$ansid')");
}
?>
<?php
header("location:Quiz.php?q=4&status=1");
}
else{
    header("location:Quiz.php?q=4&status=0");

}
?>