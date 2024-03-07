<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
{
require("sidebar.php");
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />


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
    <h1 class="display-6">Dashboard</h1>
        <hr class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                    <div class='col-sm-4 '>
                        <div class='card  text-white' style='width: 18rem;' >
                        <div class='card-body  p-4'>
                        <h5 class='card-title'>Courses</h5>
                        <h2>Total Courses</h2>
                        <h5>
                        <?php
                        include("../connect.php");
                        ?>
                        <?php
                        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                        $qs = "SELECT * FROM tblsubject";
                        $ttlstud = mysqli_query($mysql, $qs);

                        $rows = mysqli_num_rows($ttlstud);
                        echo $rows;
                            ?>
                        </h5>

                    </div>
                </div>
			</div>
                <?php
                    }
              
                ?>
<!------------------------------------------------------------------>
                                <div class='col-sm-4 '>
                                <div class='card  text-white' style='width: 18rem;'>
                                <div class='card-body p-4'>
                                <h5 class='card-title'>Faculty</h5>
                                <h2>Total Faculties</h2>
                                <h5>
                                <?php
                                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                                $qs = "SELECT * FROM tblfaculty";
                                $ttlstud = mysqli_query($mysql, $qs);

                                $rows = mysqli_num_rows($ttlstud);
                                echo $rows
                                    ?>
                                </h5>

                    </div>
                </div>
			</div>
                <?php
                    }
            //     }
            // }
                ?>
<!-- ------------------------------------------------------------------------------------------ -->
                                <div class='card  text-white' style='width: 18rem;'>
                                <div class='card-body  p-4'>
                                <h5 class='card-title'>Students</h5>
                                <h2>Total Students</h2>
                                <h5>
                                <?php
                                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                                $qs = "SELECT * FROM tblstudent";
                                $ttlstud = mysqli_query($mysql, $qs);

                                $rows = mysqli_num_rows($ttlstud);
                                echo $rows
                                    ?>
                                </h5>

                    </div>
                </div>
			</div>
                <?php
                    }
               
                ?>
                         
                    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
 crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
</body>
</html>
<?php
}
else
{
    header('location:../error.php');
}
?>


