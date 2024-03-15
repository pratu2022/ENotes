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
        <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />   
</head>
<style>
    #content {
        margin-left: 250px;
        padding: 15px;
    }
    
.icon-button {
  background: none;
  border: none;
  cursor: pointer;
  font-size: 24px;
  color: #3498db; /* Change the color as needed */
}

/* Optional: Add some styles on hover or focus */
.icon-button:hover,
.icon-button:focus {
  outline: none;
  color: #2078c6; /* Change the hover/focus color as needed */
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

    <div id="content">
    <h1 class="display-6">Assignment</h1>
    <hr class="mt-3">
        <body>
            <div class="container mt-2">
                <div class="row">
                    <div class="col-md-12">
                    <button class="button mt-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight2" aria-controls="offcanvasRight">Upload Assignment</button>

                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight2" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasRightLabel">Assignment Management</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                        	<form action="addassigndb.php" method="POST" enctype="multipart/form-data">

                                            <div class="form-group mt-3">
                                                <?php
                                                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) 
                                                    {
                                                        echo"<input type='text' name='uploadby' class ='form-control' value = '$_SESSION[name]'>";
                                                    } 
                                                ?>
                                            </div> 
                                            
                                            <div class="form-group mt-3">
                                            <select class="form-select " aria-label="Default select example" name="subject">
                                            <option selected disabled>Select Subject</option>
                                                <?php
                                                include("../connect.php");
                                                $query = "SELECT * FROM tblsubject WHERE allocated_faculty = '$_SESSION[name]'";
                                                $query_run = mysqli_query($mysql, $query);

                                                if (mysqli_num_rows($query_run) > 0) {

                                                    foreach ($query_run as $row) {
                                                            echo"<option value='$row[subject_name]'>$row[subject_name]</option>";   
                                                    }
                                                }
                                                ?>
                                                <select>
                                               
                                            </div>

                                            <div class="form-group mt-3">
                                                <input type="file" class="form-control" name="assignment" required />
                                            </div>
                                            <div class="form-group mt-3">
                                            <input type="date" name="assign_start_date" id="assign_start_date" class="form-control onlydatepicker" placeholder="Submission Start">
                                            </div>

                                            <div class="form-group mt-3">
                                            <input type="date" name="assign_end_date" id="assign_end_date" class="form-control onlydatepicker" placeholder="Event start date">
                                            </div>
                                   
                                   

                                        <div class="form-group mt-3">

                                            <select class="form-select" aria-label="Default select example"
                                                name="filetype" required>
                                                <option selected disabled>Select File-Type</option>
                                                <option value="pdf">Pdf</option>
                                                <select>
                                        </div>
                                        <div class="form-group mt-3">
                                            <textarea name="desci" cols="20" rows="4"
                                                placeholder="Enter Note Desciption" class="form-control" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="title" class="form-control" placeholder="Enter Title" id="">
                                        </div>
                                    
                                    <div class="form-group mt-3">
                                        <input type="submit" value="Upload Assignment" class="button"
                                            name="addassign">
                                    </div>
                                    </form>
                        </div>
                        </div>

                                        <?php
                            include("../connect.php");
                            $query = "SELECT * FROM tblassignment WHERE UploadedBy = '$_SESSION[name]'";
                            $query_run = mysqli_query($mysql, $query);
                            ?>

                            <div class="row mt-3">
                            <table id="myTable" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Uploaded By</th>
                                                    <th scope="col">Uploaded On</th>
                                                    <th scope="col">Subject</th>
                                                    <th scope="col">Assignment</th>
                                                    <th scope="col">Submission Start</th>
                                                    <th scope="col">Submission End</th>
                                                    <th scope="col">Action</th>
                                                    <th scope="col">View</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                <?php
                                if (mysqli_num_rows($query_run) > 0) {

                                    foreach ($query_run as $row) {
                                        ?>
                                                <tr>
                                                    <td><?php  echo $row['UploadedBy']?></td>
                                                    <td><?php  echo $row['UploadedOn']?></td>
                                                    <td><?php  echo $row['Subject']?></td>
                                                    <td><?php  echo $row['Assignment']?></td>
                                                    <td><?php  echo $row['Start_Date']?></td>
                                                    <td><?php  echo $row['Start_End']?></td>
                                                    
                                                    <td>
                                                    <div style="display: flex;">
                                                    <form action="delassigndb.php" method="POST" >
                                                    <input type="hidden" name="del_id" value="<?php echo $row['srno'] ?>">
                                                    <input type="hidden" name="del_assign" value="<?php echo $row['Assignment'] ?>">
                                                    <button type="submit" class="icon-button"  name="btn-del-assign"><i class="fa-solid fa-trash " style="color: #f70808;"></i></button>
                                                    <a href="<?php echo "../Faculty/uploadassign/" . $row['Assignment'] ?>" 
                                                        download><i class="fa fa-download icon-button mt-2" style="color:#28a745;"></i></a>
                                                    </form>
                                                    </div>
                                                    </td>
                                                    <td>
                                                    <form action="" method="POST">
                                                    <a href="viewAssignOne.php?id=<?php echo $row['srno']; ?>"
                                                    ><i class="fa-solid fa-eye icon-button mt-2"></i></a>
                                                    </form>
                                                    </td>
                                                    <!-- Delete -->
                                                    <!-- <form action="addstuddb.php" method="POST" >
                                                            <input type="hidden" name="delete_id" value="<?php //echo $row['id'] ?>">
                                                            <input type="hidden" name="del_stud_image"
                                                            value="<?php //echo $row['stud_image'] ?>">
                                                            <button type="submit"  class="icon-button" name="delete_stud_image"><i class="fa-solid fa-trash" style="color: #f70808;"></i></button>
                                                        <form> -->
                                                    </div>
                                                    
                                                
                                            
                                                
                                            
                                                </tr>
                                        <?php

                                    }

                                }
                                 else {
                                    ?>

                                    <tr>
                                        <td>No Record Found!</td>
                                        <td>No Record Found!</td>
                                        <td>No Record Found!</td>
                                        <td>No Record Found!</td>
                                        <td>No Record Found!</td>
                                        <td>No Record Found!</td>
                                        <td>No Record Found!</td>
                                        <td>No Record Found!</td>
                                    </tr>
                                    <?php
                                }
                                ?>

                                </tbody>
                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
            <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
            <script>
            $(document).ready( function () {
                $('#myTable').DataTable();
            });
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
        </body>
        </html>
        <?php
}else{
    header('location:../error.php');
}
        ?>