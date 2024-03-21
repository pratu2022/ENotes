<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
{
require("sidebar.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
          name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <!-- <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet"> -->
    <link href="style.css" rel="stylesheet">
    <link crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          referrerpolicy="no-referrer" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="../Admin/myajaxadmincourse.js"></script>    
<title>Document</title>
    <style>
     #content {
        margin-left: 130px;
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
</head>
<body>

<div id="content">


<!-- Pricing section -->
<div id="content">  
<h1 class="display-6">Notes</h1>
    <hr class="mt-3">
<section class="common-section blog-section">

<?php
 $id = $_GET['id'];
 include("../connect.php");
// $query = "SELECT * FROM tblnotes WHERE sub_id = '$id'";
$query = "SELECT * FROM tblsubject
INNER JOIN tblnotes ON tblsubject.id =tblnotes.sub_id WHERE id = '$id'";
$query_run = mysqli_query($mysql, $query);
 ?>
    <div class="container">
        <div class="row" id="tbody">
        <?php
         if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $row) {
        ?>
            <table id="myTable" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Uploaded By</th>
                                                    <th scope="col">Uploaded On</th>
                                                    <th scope="col">Subject</th>
                                                    <th scope="col">Notes</th>
                                                    <th scope="col">Visibility</th>
                                                    <th scope="col">Action</th>
                                                    <th scope="col">View</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                <?php
                                if (mysqli_num_rows($query_run) > 0) {

                                    foreach ($query_run as $row) {
                                        // echo "<pre>";
                                        // print_r($row);
                                        // echo "</pre>";
                                        ?>
                                        
                                                <tr>
                                                    <td><?php  echo $row['UploadedBy']?></td>
                                                    <td><?php  echo $row['Uploadedon']?></td>
                                                    <td><?php  echo $row['subject_name']?></td>
                                                    <td><?php  echo $row['Notes']?></td>
                                                    <td><?php  echo $row['Visibility']?></td>
                                                    <td>
                                                    <div style="display: flex;">
                                                    <form action="notesdb.php" method="POST" >
                                                    <?php
                                                        if($row['Visibility'] == 'visible')
                                                        {
                                                            ?>
                                                            <a href="notesdb.php?id=<?php echo $row['srno'];?>&status=<?php echo $row['Visibility'];?>"><i class="fa-solid fa-eye-slash icon-button mt-2" style="color: #f42b15;"></i></a>
                                                            <?php
                                                        }
                                                        elseif($row['Visibility'] == 'nonvisible')
                                                        {
                                                            ?>
                                                            <a href="notesdb.php?id=<?php echo $row['srno'];?>&status=<?php echo $row['Visibility']; ?>"><i class="fa-solid fa-eye icon-button mt-2" style="color: #43db45;"></i></a>
                                                            <?php
                                                        }
                                                        else{
                                                            echo "nhi h kuch";
                                                        }
                                                        ?>
                                                    <!-- <a href="notesdb.php?id=<?php echo $row['srno']?>&status=<?php echo $row['Visibility'] ?>"><i class="fa-solid fa-eye-slash icon-button mt-2" style="color: #f42b15;"></i></a> -->
                                                    <a href="<?php echo "../Faculty/uploadnotes/" . $row['Notes'] ?>" 
                                                        download><i class="fa fa-download icon-button mt-2" style="color:#28a745;"></i></a>
                                                    </form>
                                                    </div>
                                                    </td>
                                                    <td>
                                                    <form action="" method="POST">
                                                    <a href="viewNotesOne.php?id=<?php echo $row['srno']; ?>"
                                                    ><i class="fa-solid fa-eye icon-button mt-2"></i></a>
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
            }}
?>
          </div> 
        

</section>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
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