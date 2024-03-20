<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addSubjectdb</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
</head>

<body>
<?php
include("../connect.php");
if(isset($_POST['addsubject']))
{
    // $query = "INSERT INTO `tblsubject`(`id`, `subjectname`) VALUES (null,'$_POST[subject]')";
    $query = "INSERT INTO `tblsubject`(`id`, `subject_code`, `subject_name`, `short_name`, `allocated_faculty`,`ac_year`,`subject_type`) VALUES (null,$_POST[subject_code],'$_POST[subject_name]','$_POST[short_name]','$_POST[fac_name]','$_POST[year]','$_POST[subject_type]')";
    $query_run = mysqli_query($mysql,$query);

    if($query_run)
    {
        ?>
        <script>
           swal('Good Job!', "Subject Successfully Uploaded!!", 'success').then((value) => {
               window.location.href = 'addSubject.php';
           });
       </script>
       <?php
    }
}

if(isset($_POST['btn-del-sub']))
{
    $id = $_POST['del_id'];
    //$sub_name = $_POST['del_sub'];

    //$query = "DELETE FROM tblsubject WHERE id = '$id'";
    $query = "DELETE FROM tblsubject INNER JOIN tblnotes ON tblsubject.id =tblnotes.sub_id WHERE tblsubject.id = '$id'";
    //print_r($query);
    $query_run = mysqli_query($mysql, $query);

    if ($query_run) {
        echo "<pre>";
        print_r($query_run);
        echo "</pre>";
        ?>
        <script>
            swal('Good Job!', "Deleted Successfully!", 'success').then((value) => {
                window.location.href = 'addSubject.php';
            })
        </script>
        <?php
    } else {
        ?>
        <script>
            swal('Error!', "Couldn't", 'error').then((value) => {
                window.location.href = 'addSubject.php';
            })
        </script>
        <?php
    }
}

if(isset($_POST['upsubject']))
{
    $id = $_POST['sub_id'];
    

    // $query = "UPDATE `tblsubject` SET `subjectname`='$subname' WHERE id = $id";
    $query = "UPDATE `tblsubject` SET `subject_code`= '$_POST[subject_code]',`subject_name`='$_POST[subject_name]',`short_name`='$_POST[short_name]',`allocated_faculty`='$_POST[fac_name]',`ac_year`='$_POST[year]',`subject_type` = '$_POST[subject_type]' WHERE id = $id";
    $query_run = mysqli_query($mysql, $query);

    if ($query_run) {

        ?>
        <script>
            swal('Good Job!', "Updated Successfully!", 'success').then((value) => {
                window.location.href = 'addSubject.php';
            })
        </script>
        <?php
    } else {
        ?>
        <script>
            swal('Error!', "Couldn't", 'error').then((value) => {
                window.location.href = 'addSubject.php';
            })
        </script>
        <?php
    }

}
?>




</body>
</html>