<?php 
session_start();
$name = $_SESSION['name'];
include('../connect.php');
$time = time();

$res = mysqli_query($mysql,"SELECT * FROM tblfaculty WHERE fac_name <> '$name'");
$i = 0;

while($row = mysqli_fetch_assoc($res)){
    $i++;
    if($row['time'] > $time){
        //user online
        $status = 'Online';
        $class = 'badge-success';
    }
    else{
        // not login
        $status = 'Offline';
        $class = 'badge-danger';
    }
?>
<tr>
<td><?= $row['fac_name']?></td>
<td><span class="badge <?= $class?>"><?= $status ?></span></td>
</tr>
<?php } 
?>