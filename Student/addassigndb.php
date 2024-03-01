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
$title = $_POST['title'];
$subject = $_POST['subject'];
$desci = $_POST['desci'];
date_default_timezone_set('Asia/kolkata');
$date = date("Y-m-d");

$assign = $_FILES['assign']['name'];

$allowed_extension = array('pdf');
$filename = $_FILES['assign']['name'];
$file_extension = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($file_extension,$allowed_extension))
{
    ?>
        
    <script>
        swal('Error!', "You are allowed only Pdf Only", 'error').then((value) => {
            window.location.href = 'UploadAssignment.php';
        })
    </script>
    <?php
}
else
{
    if (file_exists("uploadAssign/" . $_FILES['assign']['name'])) {
        $filename = $_FILES['assign']['name'];
        ?>
        <script>
            swal('Error!', "Already Notes are added!" .$filename, 'error').then((value) => {
                window.location.href = 'UploadAssignment.php';
            })
        </script>
        <?php
    }
    else
    {
        $query = "INSERT INTO `tbluploadassign`(`id`, `uploadedby_stud`, `uploaded_assign`,  `title`, `description`, `subject`,`date`) VALUES (null,'$uploadby','$assign','$title','$desci','$subject',Now())";
        $query_run = mysqli_query($mysql,$query);

            if($query_run)
            {
                move_uploaded_file($_FILES["assign"]["tmp_name"],"uploadAssign/".$assign);
                
                ?>
                 <script>
                    swal('Good Job!', "Assignment Successfully Uploaded!!", 'success').then((value) => {
                        window.location.href = 'UploadAssignment.php';
                    });
                </script>
                <?php
            }

    }
}



?>
</body>
</html>