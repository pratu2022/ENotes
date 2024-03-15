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
    <h1 class="display-6">Subject</h1>
    <hr class="mt-3">
        <body>
            <div class="container mt-2">
                <div class="row">
                    <div class="col-md-12">
                    <button class="button mt-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add Subject</button>

                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasRightLabel">Subject Management</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                        <form action="addsubjectdb.php" method="POST" enctype="multipart/form-data">
                                                        
                            <div class="form-group mt-3">
                             <input type="text" class="form-control"placeholder="Enter Subject Code" name="subject_code" required/>
                             </div>
                             <div class="form-group mt-3">
                             <input type="text" class="form-control"placeholder="Enter Subject Name" name="subject_name" required/>
                             </div>
                             <div class="form-group mt-3">
                             <input type="text" class="form-control"placeholder="Enter Subject Short-Name" name="short_name" required/>
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
                            <input type="submit" value="Add Subject" class="button" name="addsubject">
                            </form>
                        </div>
                        </div>

                            <?php
                            include("../connect.php");
                            $query = "SELECT * FROM tblsubject";
                            $query_run = mysqli_query($mysql, $query);
                            ?>

                            <div class="row mt-3">
                            <table id="myTable" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Subject Code</th>
                                                    <th scope="col">Subject Name</th>
                                                    <th scope="col">Short Name</th>
                                                    <th scope="col">Allocated Faculty</th>
                                                    <th scope="col">Action</th> 
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                <?php
                                if (mysqli_num_rows($query_run) > 0) {

                                    foreach ($query_run as $row) {
                                        ?>
                                                <tr>
                                                
                                                    <td><?php  echo $row['subject_code']?></td>
                                                    <td><?php  echo $row['subject_name']?></td>
                                                    <td><?php  echo $row['short_name']?></td>
                                                    <td><?php  echo $row['allocated_faculty']?></td>
                                                    <td>
                                                    <div style="display: flex;">
                                                    <form action="updatestuddb.php" method="POST" >
                                                         <a href="updateSubject.php?id=<?php echo $row['id']; ?>"><i class="fa-solid fa-pen-to-square icon-button mt-2" style="color: #FFD43B;"></i></a>
                                                    </form>
                                                    <form action="addsubjectdb.php" method="POST" >
                                                    <input type="hidden" name="del_id" value="<?php echo $row['id'] ?>">
                                                    <input type="hidden" name="del_sub" value="<?php echo $row['subject_name'] ?>">
                                                    <span><button type="submit" class="fa-solid fa-trash icon-button mt-2" style="color: #f70808;" name="btn-del-sub"></span>
                                                    </form>
                                                    </div>
                                                    </td>
                                                    
                                               
                                                    <!-- Delete -->
                                                    <!-- <form action="addstuddb.php" method="POST" >
                                                            <input type="hidden" name="delete_id" value="<?php //echo $row['id'] ?>">
                                                            <input type="hidden" name="del_stud_image"
                                                            value="<?php //echo $row['stud_image'] ?>">
                                                            <button type="submit"  class="icon-button" name="delete_stud_image"><i class="fa-solid fa-trash" style="color: #f70808;"></i></button>
                                                        <form> -->
                                                    </div>
                                                    </td>
                                                <div class="row">
                                                <div class="col-xs-6">
                                                
                                                </div>
                                                </div>
                                            
                                                
                                            
                                                </tr>
                                        <?php

                                    }

                                }
                                 else {
                                    ?>

                                    <tr>
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
    </div>
    <?php
}
else
{
    header('location:../error.php');
}
?>