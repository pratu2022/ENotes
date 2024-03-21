<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
{
require("sidebar.php");
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Faculty</title>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />  
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css"> 

</head><style>
    #content {
        margin-left: 250px;
        padding-left: 5pc; 
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
<br/>
<div id="content">

<div class="row">
<div class="col-md-2">
<h1 class="display-6">Aboutus</h1>
</div>
</div>
<hr class="mt-3">
<button class="button mt-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Manage Aboutus</button>
<div class="container">
    <div class="row">
                
                <div class="col-md-12">    
                    
                    </div>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasRightLabel">About Us</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                    <form action="addaboutdb.php" method="POST" enctype="multipart/form-data">         
                                       <div class="form-group mt-3">
                                           <input type="text" class="form-control" placeholder="Enter Title"
                                               name="abt_title"  required/>
                                       </div>
                                     
                                       <div class="form-group mt-3">
                                           <textarea name="abt_para1" class="form-control" id="" cols="80" rows="3"
                                               placeholder="Enter First Paragraph" required></textarea>
                                       </div>
                                       <div class="form-group mt-3">
                                           <textarea name="abt_para2" class="form-control" id="" cols="80" rows="3"
                                               placeholder="Enter Second Paragraph" required></textarea>
                                       </div>
                                       <div class="form-group mt-3">
                                           <textarea name="abt_para3" class="form-control" id="" cols="80" rows="3"
                                               placeholder="Enter Third Paragraph" required></textarea>
                                       </div>

                                      
                                       <div class="form-group mt-3">
                                           <input type="submit" value="Submit" class="button"
                                               name="save_about">
                                       </div>
                                       
                                   </form>
                    </div>
                    </div>
                   
                </div>
            </div>

<div class="clearfix"></div>
<br/>
<?php
include("../connect.php");
$query = "SELECT * FROM tblabout";
$sql = mysqli_query($mysql, $query);
?>
<div id="faculty">
    <table class="table table-striped" id="myTable">
    <thead>
    <tr>
    <th>About Title</th>
    <th>About Paragraph-1</th>
    <th>About Paragraph-2</th>
    <th>About Paragraph-3</th>
    <th>Visibility</th>
    <th>Action</th>
    
    </tr>
</thead>
<tbody>
<?php while($row= mysqli_fetch_array($sql)) { ?>
    <tr>
    <td><?php echo $row["abt_title"]; ?></td>
    <td><?php echo $row["abt_para1"]; ?></td>
    <td><?php echo $row["abt_para2"]; ?></td>
    <td><?php echo $row["abt_para3"]; ?></td>
    <td><?php echo $row["Visibility"]; ?></td>
    <?php
if($row['Visibility'] == 'visible')
    {
?>
    <td><a href="addaboutdb.php?id=<?php echo $row['id']?>&status=<?php echo $row['Visibility'] ?>"><i class="fa-solid fa-eye-slash icon-button mt-2" style="color: #f42b15;"></i></a></td>
 <?php
 }
  elseif($row['Visibility'] == 'nonvisible')
 {
?>
    <td><a href="addaboutdb.php?id=<?php echo $row['id']?>&status=<?php echo $row['Visibility'] ?>"><i class="fa-solid fa-eye icon-button mt-2" style="color: #43db45;"></i></i></a></td>
<?php
 }
   else
{
?>
    <td><a href="addaboutdb.php?id=<?php echo $row['id']?>&status=<?php echo $row['Visibility'] ?>"><i class="fa-solid fa-eye-slash icon-button mt-2" style="color: #f42b15;"></i></a></td>
<?php
}
 ?>
    
    </tr>
<?php } ?>
</tbody>
    </table>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
</body>
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
</div>
</html>
<?php
}
else
{
    header('location:../error.php');
}
?>

