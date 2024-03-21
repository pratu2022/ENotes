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