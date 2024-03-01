<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
{
require("sidebar.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
    #content {
        margin-left: 250px;
        padding: 15px;
    }
    .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #614385;
            color: #fff;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
            }

            .button:hover {
            transform: scale(1.1); /* Scale the button by 10% on hover */
            }
</style>

<body>


        <body>
            <div id="content">
            <h1 class="display-6">Update Subject</h1>
            <hr class="mt-3">
            <?php
                                     include("../connect.php");
                                     $id = $_GET['id'];
                                     $query = "SELECT * FROM tblsubject WHERE id ='$id'";
                                     $query_run = mysqli_query($mysql,$query);
                                     if(mysqli_num_rows($query_run) > 0)
                                     {
                                        foreach($query_run as $row)
                                        {
                                            ?>
            <div class="container mt-2">
                <div class="row">
                    <div class="col-md-12">
                    <button class="button" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Edit Subject</button>

                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasRightLabel">Edit Subject</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                        <form action="addsubjectdb.php" method="POST" enctype="multipart/form-data">
                                                        
                        <div class="form-group mt-3">
                        <input type="hidden" name="sub_id" value="<?php  echo $row['id']; ?>">
                        <input type="text" class="form-control"placeholder="Enter Subject Code" name="subject_code" value="<?php  echo $row['subject_code']; ?>" required/>
                        </div>
                        <div class="form-group mt-3">
                        <input type="text" class="form-control"placeholder="Enter Subject Name" name="subject_name"  value="<?php  echo $row['subject_name']; ?>" required/>
                        </div>
                        <div class="form-group mt-3">
                        <input type="text" class="form-control"placeholder="Enter Subject Short-Name" name="short_name"  value="<?php  echo $row['short_name']; ?>" required/>
                        </div>
                        <div class="form-group mt-3">
                        <select class="form-select " aria-label="Default select example" name="fac_name">
                        <option selected disabled>Select Faculty</option>
                        <?php
                        include("../connect.php");
                        $query = "SELECT * FROM tblfaculty";
                        $query_run = mysqli_query($mysql, $query);
                            
                        if (mysqli_num_rows($query_run) > 0) {
                            
                        foreach ($query_run as $row) {
                        echo"<option value='$row[fac_name]'>$row[fac_name]</option>";   
                        }
                        }
                         ?>
                        <select>
                        </div>
                        <input type="submit" value="Update Subject"  class="button" name="upsubject">
                        </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                                        }
                                    }
                                            ?>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
            <script
                src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
           
        </body>

        </html>
    </div>
    <?php
}
else
{
    header('location:../error.php');
}
?>