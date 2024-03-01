<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

<?php
include_once('../connect.php');
?>
<?php 
$id = $_GET['id'];
$status = $_GET['status'];


// echo "$id";
// echo "$status";

if($status=="approved")
{
    ?>
    <!-- Denied hoga -->
    <?php
     $select = "UPDATE tbluploadassign SET status = 'denied' WHERE id = '$id'";
     $result = mysqli_query($mysql,$select);
    ?>
      <script>
          swal('Oops', "You, Denied Assignment", 'error').then((value) => {
            window.location.href = 'viewStudAssign.php';
          })
      </script>
      <?php
   // header("location:approve.php");
}
elseif($status=="denied"){
    ?>
    <!-- Approved hoga -->
    <?php
     $select = "UPDATE tbluploadassign SET status = 'approved' WHERE id = '$id' ";
     $result = mysqli_query($mysql,$select);
     ?>
      <script>
          swal('Good Job!', "You,Approved Assignment", 'success').then((value) => {
            window.location.href = 'viewStudAssign.php';
          })
      </script>
      <?php
     //header("location:approve.php");
     ?>
    <?php
}
else{
    $statusup = $_GET['statusup'];
    if($status=="pending" && $statusup="approve")
    {
    
        $select = "UPDATE tbluploadassign SET status = 'approved' WHERE id = '$id' ";
        $result = mysqli_query($mysql,$select);
       
        ?>
      <script>
          swal('Good Job!', "You,Approved Pending Assignment", 'success').then((value) => {
            window.location.href = 'viewStudAssign.php';
          })
      </script>
      <?php


    }
    elseif($status="pending" && $statusup="denied")
    {
        $select = "UPDATE tbluploadassign SET status = 'denied' WHERE id = '$id' ";
        $result = mysqli_query($mysql,$select);
       
        ?>
      <script>
          swal('Oops!', "You,Denied Pending Assignment", 'error').then((value) => {
            window.location.href = 'viewStudAssign.php';
          })
      </script>
      <?php
    }
    else{
    ?>
    pending hoga
    <?php
    }
}

?>
    
    </body>
</html>