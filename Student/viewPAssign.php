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
    $query = "SELECT * FROM tblassignment WHERE Subject = '$subname'";
    $query_run = mysqli_query($mysql, $query);
           
?>
<h1 class="display-6"><?php echo $subname ?></h1><span><a href="viewAssignment.php" class="button mt-2">Back</a></span></span>
<hr class="mt-3">
 <?php 
    if(mysqli_num_rows($query_run)>0){
        foreach($query_run as $row){
                                        ?>
                                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php  echo $row['srno']?>" aria-expanded="false" aria-controls="flush-collapseOne">
                                                    <h6><?php  echo $row['Title']?> </h6>
                                                </button>
                                                </h2>
                                                <div id="<?php  echo $row['srno']?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                <!-- <tr>
                                                <td><?php  //echo $row['UploadedBy']?></td>
                                                <td><?php // echo $row['Uploadedon']?></td>
                                                </tr> -->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                    <b><span class="text-muted ml-1 mt-2">Uploaded On : <?php  echo $row['UploadedOn']?></span></br>
                                                    <span class="text-muted ml-1 mt-2">Uploaded By : <?php  echo $row['UploadedBy']?></span></br></br></b>
                                                    <embed src="<?php echo "../Faculty/uploadassign/" . $row['Assignment'] ?>" type="application/pdf"  frameborder="0" class="mt" />
                                                    </div>
                                                </div>
                                                <!-- <a href="<?php// echo "../Faculty/uploadnotes/" . $row['Notes'] ?>" class="btn btn-success mt-3"
                                                        download>DOWNLOAD</a> -->
                                                    <form>
                                                        <a href="viewAssignOne.php?id=<?php echo $row['srno']; ?>"
                                                    ><i class="fa-solid fa-eye icon-button mt-2"></i></a>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        <?php
                                    }

                                }
                            
                            ?>
<?php 
}else{
    echo "nhi mila";
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