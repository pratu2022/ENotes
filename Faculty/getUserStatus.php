<?php 
include('../connect.php');
$time = time();

$res = mysqli_query($mysql,"Select * from tblfaculty");
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