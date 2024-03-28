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
$allocated_faculty = $_POST['allocated_faculty'];
$title = $_POST['title'];
$total = $_POST['total'];
$right = $_POST['right'];
$wrong = $_POST['wrong'];
$desc = $_POST['desc'];
$id=uniqid();



        $query = "INSERT INTO `tblquiz`(`eid`, `allocated_faculty`,`title`,`total`, `ryt`, `wrg`, `desc`) VALUES ('$id','$allocated_faculty','$title','$total','$right','$wrong','$desc')";
        $query_run = mysqli_query($mysql,$query);

            if($query_run)
            {
                
                ?>
                 <script>
                    swal('Good Job!', "Quiz Successfully Uploaded!!", 'success').then((value) => {
                        window.location.href = 'Questions.php?id=<?php echo $id?>&n=<?php echo $total;?>';
                    });
                </script>
                <?php
            }





?>
</body>
</html>