<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
{
 require("sidebar.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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

.icon-button {
  background: none;
  border: none;
  cursor: pointer;
  font-size: 30px;
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
            text-decoration:none;
            color: #fff;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
            }

            .button:hover {
            text-decoration:none;
            color:#fff;
            transform: scale(1.1); /* Scale the button by 10% on hover */
            }
</style>
<body>
<div id="content">
<?php

include("../connect.php");
if(isset($_POST['view']))
{

    $subname = $_POST['subname'];
    $query = "SELECT * FROM tbluploadassign WHERE subject = '$subname'";
    $query_run = mysqli_query($mysql, $query);
           
?>
<h1 class="display-6"><?php echo $subname ?></h1><span><a href="viewSAssign.php" class="button mt-2">Back</a></span></span>
<hr class="mt-3">

 <?php 
    if(mysqli_num_rows($query_run)>0){
        foreach($query_run as $row){
                                        ?>
                                        <table id="myTable" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Uploaded By</th>
                                                    <th scope="col">Uploaded On</th>
                                                    <th scope="col">Subject</th>
                                                    <th scope="col">Assignment</th>
                                                    <th scope="col">Status</th>
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
                                                    <td><?php  echo $row['uploadedby_stud']?></td>
                                                    <td><?php  echo $row['uploadedon']?></td>
                                                    <td><?php  echo $row['subject']?></td>
                                                    <td><embed src="<?php echo "../Student/uploadAssign/" . $row['uploaded_assign'] ?>" type="application/pdf" width="80" height="80" frameborder="0" /></td>
                                                    <td><?php  echo $row['status']?></td>
                                                    <td>
      
                                                        <?php
                                                        if($row['status'] == 'approved')
                                                        {
                                                            ?>
                                                            <a href="ApproveReject.php?id=<?php echo $row['id']?>&status=<?php echo $row['status'] ?>"><i class="fa-solid fa-xmark icon-button mt-2" style="color: #D04848;"></i></a>
                                                            <?php
                                                        }
                                                        elseif($row['status'] == 'denied')
                                                        {
                                                            
                                                            ?>
                                                            <a href="ApproveReject.php?id=<?php echo $row['id']?>&status=<?php echo $row['status'] ?>"><i class="fa-solid fa-check icon-button mt-2 mr-3" style="color: #416D19;"></i></a>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <a href="ApproveReject.php?id=<?php echo $row['id']?>&status=<?php echo $row['status']?>&statusup=approve"><i class="fa-solid fa-check icon-button mt-2 mr-3" style="color: #416D19;"></i></a>
                                                            <a href="ApproveReject.php?id=<?php echo $row['id']?>&status=<?php echo $row['status']?>statusup=denied"><i class="fa-solid fa-xmark icon-button mt-2" style="color: #D04848;"></i></a>
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>

                                                    
                                                    <td>
                                                    <form action="viewSAssignOne.php" method="POST">
                                                    <input type="hidden" name="subname" value="<?php echo"$row[subject]" ?>">
                                                    <input type="hidden" name="id" value="<?php echo"$row[id]" ?>">
                                                    <button type='submit'  class='btn btn-success mt-1' name='view'><i class='fa-solid fa-arrow-right' style='color: #fff;'></i></button>
                                                    </form>
                                                    </td>
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
                                    </tr>
                                    <?php
                                }
                                ?>

                                </tbody>
                        </table>
                                        <?php

                                    }

                                }
                            
                            ?>
<?php 
}else{
        ?>
        <script>
                window.location.href = 'viewSAssign.php';
        </script>
        <a href="viewSAssign.php">Please Wait to Redirect</a>
        <?php
   } 
?>
<?php
?>
        <!-- <div class="container ">
            <div class="row">
                <div class="col-md-12">
                            <div class="row">
                            <h1 class="display-6">Notes Description</h1>
                            <hr class="mt-3">
                            
                            
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
   -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
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