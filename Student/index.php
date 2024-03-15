<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
{
require("sidebar.php");
require("../connect.php");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<style>
    #content {
        margin-left: 250px;
        padding: 15px;
    }
    .card
    {
        background-color: #63a91f;
        background: linear-gradient(115deg, #614385, #516395);
        box-shadow: 10px 10px 31px -1px rgba(0,0,0,0.75);
        -webkit-box-shadow: 10px 10px 31px -1px rgba(0,0,0,0.75);
        -moz-box-shadow: 10px 10px 31px -1px rgba(0,0,0,0.75);
        border-radius: 5px 50px;
    }
    .scrollable-content {
            max-height: 20pc; /* Adjust this value based on your content height */
            overflow-y: auto;
        }
   
</style>

<body>

    <div id="content">
        <div class="container">
        <h1 class="display-6">Dashboard</h1>
        <hr class="mt-3">
            <div class="row">
                <div class="col-md-12">
                    <!-- row-start -->
                    <div class="row">
                        <div class="col-sm-4">
                        <div class="card p-4 text-white mt-3"  style='width: 18rem;'>
                        <div class="card-body">
                        <h5 class='card-title'>Courses</h5>
                        <h2>Total Courses</h2>
                        <h5>
                            <?php
                             $qs = "SELECT * FROM tblsubject";
                             $ttlstud = mysqli_query($mysql, $qs);
     
                             $rows = mysqli_num_rows($ttlstud);
                             echo $rows;
                            ?>
                        </h5>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card p-4 text-white mt-3"  style='width: 18rem;'>
                        <div class="card-body">
                        <h5 class='card-title'>Classmate</h5>
                        <h2>Total Classmates</h2>
                        <h5>
                            <?php
                             $qs = "SELECT * FROM tblstudent";
                             $ttlstud = mysqli_query($mysql, $qs);
     
                             $rows = mysqli_num_rows($ttlstud);
                             echo $rows;
                            ?>
                        </h5>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card p-4 text-white mt-3"  style='width: 18rem;'>
                        <div class="card-body">
                        <h5 class='card-title'>Faculty</h5>
                        <h2>Total Faculty</h2>
                        <h5>
                            <?php
                             $qs = "SELECT * FROM tblfaculty";
                             $ttlstud = mysqli_query($mysql, $qs);
     
                             $rows = mysqli_num_rows($ttlstud);
                             echo $rows;
                            ?>
                        </h5>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card p-4 text-white mt-5"  style='width: 18rem;'>
                        <div class="card-body">
                        <h5 class='card-title'>Approved</h5>
                        <h2>Total Approve</h2>
                        <h5>
                            <?php
                             $qs = "SELECT * FROM tbluploadassign WHERE uploadedby_stud = '$_SESSION[name]' AND status = 'approved'";
                            //  echo $qs;
                             $ttlstud = mysqli_query($mysql, $qs);
                             $rows = mysqli_num_rows($ttlstud);
                             echo $rows;
                            ?>
                        </h5>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card p-4 text-white mt-5"  style='width: 18rem;'>
                        <div class="card-body">
                        <h5 class='card-title'>Pending</h5>
                        <h2>Total Pending</h2>
                        <h5>
                            <?php
                             $qs = "SELECT * FROM tbluploadassign WHERE uploadedby_stud = '$_SESSION[name]' AND status = 'pending'";
                             $ttlstud = mysqli_query($mysql, $qs);
     
                             $rows = mysqli_num_rows($ttlstud);
                             echo $rows;
                            ?>
                        </h5>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card p-4 text-white mt-5"  style='width: 18rem;'>
                        <div class="card-body">
                        <h5 class='card-title'>Denied</h5>
                        <h2>Total Denied</h2>
                        <h5>
                            <?php
                             $qs = "SELECT * FROM tbluploadassign WHERE uploadedby_stud = '$_SESSION[name]' AND status = 'denied'";
                             $ttlstud = mysqli_query($mysql, $qs);
     
                             $rows = mysqli_num_rows($ttlstud);
                             echo $rows;
                            ?>
                        </h5>
                        </div>
                        </div>
                    </div>
                    </div>
                    </div>

                    </div>
                    <!-- row-end -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
<?php
}
else
{
    header('location:../error.php');
}
?>