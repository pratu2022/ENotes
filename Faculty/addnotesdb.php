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
$desci = $_POST['desci'];
$title = $_POST['title'];
date_default_timezone_set('Asia/kolkata');
$date = date("Y-m-d");


$allowed_extension = array('pdf', 'docx','mp4');
// $filename = $_FILES['notes']['name'];
// $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

$length = count($_FILES['notes']['name']);

for($i=0;$i<$length;$i++)
{
//     if(!in_array($file_extension,$allowed_extension))
// {
//     ?>
        
//     <script>
//         swal('Error!', "You are allowed only Pdf,Docx,mp4 Only", 'error').then((value) => {
//             window.location.href = 'addNotes.php';
//         })
//     </script>
//     <?php
// }
// else
// {
    if (file_exists("uploadnotes/" . $_FILES['notes']['name'][$i])) {
        $filename = $_FILES['notes']['name'][$i];
        ?>
        <script>
            swal('Error!', "Already Notes are added!" .$filename, 'error').then((value) => {
                window.location.href = 'addNotes.php';
            })
        </script>
        <?php
    }
    else
    {
        $notes = $_FILES['notes']['name'][$i];

        $query = "INSERT INTO `tblnotes`(`srno`, `UploadedBy`, `Uploadedon`, `Subject`, `Notes`, `Type`, `Description`,`Title`) VALUES (null,'$uploadby','$date','$subject','$notes','$filetype','$desci','$title')";
        $query_run = mysqli_query($mysql,$query);

            if($query_run)
            {
                move_uploaded_file($_FILES["notes"]["tmp_name"][$i],"uploadnotes/".$notes);
                
                ?>
                 <script>
                    swal('Good Job!', "Notes Successfully Uploaded!!", 'success').then((value) => {
                        window.location.href = 'addNotes.php';
                    });
                </script>
                <?php
            }

    }
}
// }




?>
</body>
</html>