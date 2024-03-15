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
if(isset($_POST['contact_submit']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    date_default_timezone_set('Asia/kolkata');
    $date = date("Y-m-d");

    // $query="INSERT INTO tblcontact values(null,'$fname','$lname','$email','$message')";
    $query="INSERT INTO `tblcontact`(`id`, `first_name`, `last_name`, `email`, `message`, `register_date`) VALUES ( null,'$fname','$lname','$email','$message','$date')";
     
    if(mysqli_query($mysql,$query))
    {
        
    ?>
        
    <script>
        swal('Success', "Message Sended", 'success').then((value) => {
            window.location.href = '../index.php';
        })
    </script>
    <?php
    }
    else{
        ?>
        
        <script>
            swal('Error', "Message not Sended", 'error').then((value) => {
                window.location.href = '../index.php';
            })
        </script>
        <?php
    }
}
?>
</body>
</html>