<?php
session_start();
require('sidebar.php');
require("../connect.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    
        <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
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
.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
  }
</style>

<body>
<div id="content">
<h1 class="display-6">Student</h1>
 <hr class="mt-3">
<?php
                            include("../connect.php");
                            $query = "SELECT * FROM tblstudent";
                            $query_run = mysqli_query($mysql, $query);
                            ?>

                            <div class="row p-3">
                            <table  id="myTable" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Student Registration No</th>
                                                    <th scope="col">Student Name</th>
                                                    <th scope="col">Student Email</th>
                                                    <th scope="col">Student Address</th>
                                                    <th scope="col">Student Image</th>
                                                    <th scope="col">Student Phone</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-group-divider">
                                <?php
                                if (mysqli_num_rows($query_run) > 0) {

                                    foreach ($query_run as $row) {
                                        ?>
                                        
                                           
                                                <tr>
                                                    
                                                    <td><?php  echo $row['regno']?></td>
                                                    <td><?php  echo $row['stud_name']?></td>
                                                    <td><?php  echo $row['stud_email']?></td>
                                                    <td><?php  echo $row['stud_address']?></td>
                                                    <td><img src="<?php echo "../Admin/uploads/" . $row['stud_image'] ?>" alt="" width ="50" height="50"></td>
                                                    <td><?php  echo $row['stud_phone']?></td>
                                                    <td>
                                                    <button class="icon-button"  data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-eye" style="color:#28a745;"></i></button>
                                                    </td>
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
                                    </tr>
                                    <?php
                                }
                                ?>

                                </tbody>
                        </table>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
  });
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php  echo $row['regno']?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-3">
            <img src="<?php echo "../Admin/uploads/" . $row['stud_image'] ?>" alt="" width ="50" height="50">
            </div>
            <div class="col-sm-9">
             <p class='text-muted'><br><?php  echo $row['register_date']?></p>
             <p class='fs-6 fw-bolder'>Student Name: <?php  echo $row['stud_name']?><br>Student Email: <?php  echo $row['stud_email']?><br>Student PhoneNo: <?php  echo $row['stud_phone']?><br>Student Address:<?php  echo $row['stud_address']?></p>
             </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
</html>




