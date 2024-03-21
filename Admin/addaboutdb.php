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
include("../connect.php");
if(isset($_POST['save_about']))
{
       
        $abt_title = $_POST['abt_title'];
        $abt_para1 = $_POST['abt_para1'];
        $abt_para2 = $_POST['abt_para2'];
        $abt_para3 = $_POST['abt_para3'];
 
                $query = "INSERT INTO `tblabout`(`id`, `abt_title`, `abt_para1`, `abt_para2`, `abt_para3`) VALUES (null,'$abt_title','$abt_para1','$abt_para2','$abt_para3')";
                $query_run = mysqli_query($mysql, $query);

                if($query_run)
                {

                    ?>
                    <script>
                        swal('Good Job!', "Record Insert", 'success').then((value) => {
                            window.location.href = 'addaboutus.php';
                        })
                    </script>
                    <?php
                }
            
        }

        $id = $_GET['id'];
        $status = $_GET['status'];
if($status=="visible")
{
    ?>
    <!-- Denied hoga -->
    <?php
     $select = "UPDATE tblabout SET Visibility = 'nonvisible' WHERE id = '$id'";
     $result = mysqli_query($mysql,$select);
    ?>
      <script>
          swal('success', "Visible in About Page", 'success').then((value) => {
            window.location.href = 'addaboutus.php';
          })
      </script>
      <?php
   // header("location:approve.php");
}
elseif($status =="nonvisible")
{
    ?>
    <!-- Denied hoga -->
    <?php
     $select = "UPDATE tblabout SET Visibility = 'visible' WHERE id = '$id'";
     $result = mysqli_query($mysql,$select);
    ?>
      <script>
          swal('Oops', "Not Visible in About Page", 'error').then((value) => {
            window.location.href = 'addaboutus.php';
          })
      </script>
      <?php
}
else{
    ?>
    <script>
        swal('Oops', "Something Went Wrong", 'error').then((value) => {
          window.location.href = 'addaboutus.php';
        })
    </script>
    <?php
}

?>
</body>
</html>