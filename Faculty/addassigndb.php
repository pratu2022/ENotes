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
$uploadby = $_POST['uploadby'];
$subject = $_POST['subject'];
$filetype = $_POST['filetype'];
$assign_start_date = $_POST['assign_start_date'];
$assign_end_date = $_POST['assign_end_date'];
$desci = $_POST['desci'];
date_default_timezone_set('Asia/kolkata');
$date = date("Y-m-d");

$assign = $_FILES['assignment']['name'];

$allowed_extension = array('pdf');
$filename = $_FILES['assignment']['name'];
$file_extension = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($file_extension,$allowed_extension))
{
    ?>
        
    <script>
        swal('Error!', "You are allowed only Pdf Only", 'error').then((value) => {
            window.location.href = 'addAssignment.php';
        })
    </script>
    <?php
}
else
{
    if (file_exists("uploadassign/" . $_FILES['assignment']['name'])) {
        $filename = $_FILES['assignment']['name'];
        ?>
        <script>
            swal('Error!', "Already Assignment are added!" .$filename, 'error').then((value) => {
                window.location.href = 'addAssignment.php';
            })
        </script>
        <?php
    }
    else
    {
        $query = "INSERT INTO `tblassignment`(`srno`, `UploadedBy`,  `Subject`, `Assignment`, `Start_Date`, `Start_End`,`Type`, `Description`) VALUES (null,'$uploadby','$subject','$assign','$assign_start_date','$assign_end_date','$filetype','$desci')";
        $query_run = mysqli_query($mysql,$query);

            if($query_run)
            {
                move_uploaded_file($_FILES["assignment"]["tmp_name"],"uploadassign/".$assign);
                
                ?>
                 <script>
                    swal('Good Job!', "Assignment Successfully Uploaded!!", 'success').then((value) => {
                        window.location.href = 'addAssignment.php';
                    });
                </script>
                <?php
            }

    }
}



?>
</body>
</html>