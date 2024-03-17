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
    <title>add Faculity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />  
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css"> 
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        
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


</style>

<body>
    

    <div id="content">
    <h1 class="display-6">Faculty</h1>
    <hr class="mt-3">
            <div class="container mt-2">
               
                <div class="row">
                
                    <div class="col-md-12">    
                        <div class="row">
                            <div class="col-md-6">
                            <form action="export.php" method="post">
                            <button class="button mt-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Faculty Registration</button>
                            <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-success">Export to excel</button>
                            </form>
                            </div>
                        </div>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasRightLabel">Faculty Registration</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                        <form action="addfacdb.php" method="POST" enctype="multipart/form-data">

                                         <div
                                            style="border:1px solid black; height:150px; width:150px; background:#F5FAFF;margin-left:6pc;">
                                            <img id="output" width="150" height="150">
                                        </div>           
                                           <div class="form-group mt-3">
                                               <input type="text" class="form-control" placeholder="Enter Faculty Name"
                                                   name="fac_name"  required/>
                                           </div>
                                           <div class="form-group mt-3">
                                               <input type="phone" class="form-control"
                                                   placeholder="Enter Faculty Phone" name="fac_phone" required />
                                           </div>
                                           <div class="form-group mt-3">
                                               <input type="email" class="form-control"
                                                   placeholder="Enter Faculty Email" name="fac_email" required />
                                           </div>
                                           <div class="form-group mt-3">
                                               <textarea name="fac_add" class="form-control" id="" cols="80" rows="3"
                                                   placeholder="Enter Faulty Address" required></textarea>
                                           </div>

                                           <div class="form-group mt-3">
                                               <input type="text" class="form-control"
                                                   placeholder="Enter Faculty Username" name="fac_username"required />
                                           </div>

                                           <div class="form-group mt-3">
                                               <input type="password" class="form-control"
                                                   placeholder="Enter Faculty Password" name="fac_password" required />
                                           </div>
                                           
                                           <!-- <input type="date" name="date" id="event_start_date" class="form-control onlydatepicker" placeholder="Event start date"> -->

                                           
                                           <div class="form-check  form-check-inline">
                                               <input class="form-check-input" type="radio" name="fac_gender"
                                                   id="flexRadioDefault1" value = "Male">
                                               <label class="form-check-label" for="flexRadioDefault1">
                                                   Male
                                               </label>
                                           </div>
                                           <div class="form-check form-check-inline">
                                               <input class="form-check-input" type="radio" name="fac_gender"
                                                   id="flexRadioDefault2" value = "Female" checked>
                                               <label class="form-check-label" for="flexRadioDefault2">
                                                   Female
                                               </label>
                                           </div>
                                           <div class="form-group mt-3">
                                               <input type="file" name="fac_image" id="upload_image" required
                                                   class="form-control"
                                                   onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                           </div>
                                           
                                           <div class="form-group mt-3">
                                               <input type="submit" value="Submit" class="button"
                                                   name="save_fac_image">
                                           </div>
                                           
                                       </form>
                        </div>
                        </div>
                       
                    </div>
                </div>




                <!-- Table -->
                <?php
                            include("../connect.php");
                            $query = "SELECT * FROM tblfaculty";
                            $query_run = mysqli_query($mysql, $query);
                           
                            ?>

                            <div class="row p-3">
                            <table  id="myTable" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Faculty Registration No</th>
                                                    <th scope="col">Faculty Name</th>
                                                    <th scope="col">Faculty Email</th>
                                                    <th scope="col">Faculty Address</th>
                                                    <th scope="col">Faculty Image</th>
                                                    <th scope="col">Faculty Phone</th>
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
                                                    <td><?php  echo $row['fac_name']?></td>
                                                    <td><?php  echo $row['fac_email']?></td>
                                                    <td><?php  echo $row['fac_address']?></td>
                                                    <td><img src="<?php echo "uploadf/" . $row['fac_image'] ?>" alt="" width ="50" height="50"></td>
                                                    <td><?php  echo $row['fac_phone']?></td>
                                                    <td>
                                                    <div style="display: flex;">
                                                    <!-- Update -->
                                                    <form action="updatefacdb.php" method="POST">
                                                    <a href="updateFaculty.php?id=<?php echo $row['id']; ?>"
                                                    ><i class="fa-solid fa-pen-to-square icon-button mt-2" style="color: #FFD43B;"></i></a>
                                                    </form>
                                                    <!-- Delete -->
                                                    <form action="addfacdb.php" method="POST">
                                                    <input type="hidden" name="delete_id"
                                                    value="<?php echo $row['id'] ?>">
                                                    <input type="hidden" name="del_fac_image"
                                                    value="<?php echo $row['fac_image'] ?>">
                                                    <button type="submit" class="icon-button"
                                                    name="delete_fac_image"><i class="fa-solid fa-trash" style="color: #f70808;"></i></button>
                                                    </form>
                                                    </div>
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

</html>

</div>
<?php
}
else
{
    header('location:../error.php');
}
?>