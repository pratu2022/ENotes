<?php
session_start();
$name = $_SESSION['name'];
include_once("../connect.php");
if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) {
    $eid=@$_GET['eid'];
    $sn=@$_GET['n'];
    $total=@$_GET['t'];
    $ans=$_POST['ans'];
    $qid=@$_GET['qid'];
    $q=mysqli_query($mysql,"SELECT * FROM answer WHERE qid='$qid' " );
    while($row=mysqli_fetch_array($q) )
    {
    $ansid=$row['ansid'];
    }
    if($ans == $ansid)
    {
    $q=mysqli_query($mysql,"SELECT * FROM tblquiz WHERE eid='$eid'" );
    while($row=mysqli_fetch_array($q) )
    {
    //  echo "sahi";
    $ryt=$row['ryt'];
    }
    if($sn == 1)
{
$q=mysqli_query($mysql,"INSERT INTO history VALUES('$name','$eid' ,'0','0','0','0',NOW())")or die('Error');
}
$q=mysqli_query($mysql,"SELECT * FROM history WHERE eid='$eid' AND name='$name' ")or die('Error115');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$r=$row['ryt'];
}
$r++;
$s=$s+$ryt;
$q=mysqli_query($mysql,"UPDATE `history` SET `score`=$s,`level`=$sn,`ryt`=$r, date= NOW()  WHERE  name = '$name' AND eid = '$eid'")or die('Error124');
}
else
{
$q=mysqli_query($mysql,"SELECT * FROM tblquiz WHERE eid='$eid' " )or die('Error129');

while($row=mysqli_fetch_array($q) )
{
$wrong=$row['wrg'];
}
if($sn == 1)
{
$q=mysqli_query($mysql,"INSERT INTO history VALUES('$name','$eid' ,'0','0','0','0',NOW() )")or die('Error137');
}
$q=mysqli_query($mysql,"SELECT * FROM history WHERE eid='$eid' AND name='$name' " )or die('Error139');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$w=$row['wrg'];
}
$w++;
$s=$s-$wrong;
$q=mysqli_query($mysql,"UPDATE `history` SET `score`=$s,`level`=$sn,`wrg`=$w, date=NOW() WHERE  name = '$name' AND eid = '$eid'")or die('Error147');
}
if($sn != $total)
{
$sn++;
header("location:start.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total")or die('Error152');
}
elseif( $_SESSION['key']!='pratu'){
$q=mysqli_query($mysql,"SELECT score FROM history WHERE eid='$eid' AND name='$name'" )or die('Error156');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
}
$q=mysqli_query($mysql,"SELECT * FROM rank WHERE name='$name'" )or die('Error161');
$rowcount=mysqli_num_rows($q);
if($rowcount == 0)
{
$q2=mysqli_query($mysql,"INSERT INTO rank VALUES('$name','$s',NOW())")or die('Error165');
}
}else
{
header("location:result.php?q=result&eid=$eid");
}


}
?>
