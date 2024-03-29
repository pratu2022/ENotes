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
    <title>View Notes</title>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.4.456/pdf.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
     #content {
        margin-left: 250px;
         padding: 20px; 
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
            .btn-text-right{
        text-align: right;
        }
     .btns {
      display: inline-block;
      padding: 10px 20px;
      text-decoration: none;
      background-color: #4CAF50;
      color: white;
      border: 1px solid #4CAF50;
      border-radius: 5px;
      font-weight: bold;
    }

    /* Hover effect */
     .btns :hover {
      background-color: #45a049;
    }
       
/* Chrome, Edge and Safari */
*::-webkit-scrollbar {
  height: 10px;
  width: 10px;
}
*::-webkit-scrollbar-track {
  border-radius: 5px;
  background-color: #DFE9EB;
}

*::-webkit-scrollbar-track:hover {
  background-color: #B8C0C2;
}

*::-webkit-scrollbar-track:active {
  background-color: #b99aff;
}

*::-webkit-scrollbar-thumb {
  border-radius: 5px;
  background-color: #614385;
}

*::-webkit-scrollbar-thumb:hover {
  background-color: #b99aff;
}

*::-webkit-scrollbar-thumb:active {
  background-color: #b99aff;
}
</style>
<body>
   <div id="content">
   <div class="container">
       
        <?php
            include("../connect.php");
            if(isset($_POST['view']))
            {
            
                $id = $_POST['id'];
                $subname = $_POST['subname'];
                $query = "SELECT * FROM tblassignment WHERE Subject = '$subname' AND srno = '$id'";
                $query_run = mysqli_query($mysql, $query);
                       
            ?>
            
             <h1 class="display-6"><?php echo $subname ?></h1>
             <hr class="mt-3">

              <?php

            if(mysqli_num_rows($query_run) > 0)
            {
            foreach($query_run as $row)
            {
            ?>
                <p class="text-muted"><?php  //echo $row['Uploadedon']?></p>
                <!-- <p><?php //echo $row['Description']?></p> -->
                    <!-- <div class="col-2">
                    <a href="<?php echo "../Faculty/uploadnotes/" . $row['Assignment'] ?>" class="icon-button" download><i class="fa fa-download icon-button mt-2" style="color:#28a745;"></i></a>
                    </div> -->
                    <div class="col-12">
                   
                    <?php 
                      $pd = "../Faculty/uploadassign/" . $row['Assignment'];
                        if($row['Type'] == 'pdf' || $row['Type'] == 'docx')
                        {
                           if($row['Type'] == 'pdf'){
                            ?>
                            <!-- <div class="card w-75 h-100">
                            <div class="card-body">
                            <div class="row"> -->
                            <embed src="<?php echo "../Faculty/uploadassign/" . $row['Assignment'] ?>" type="application/pdf" width=700 height=700  frameborder="0" /></br>
                            <a href="<?php echo "../Faculty/uploadassign/" . $row['Assignment'] ?>" class="button mt-2 mb-3 ml-3" download>Download</a> <span><a href="viewNotes.php" class="button mt-2">Back</a></span></span>
                            <?php
                           }
                        }
                       
                    ?>
                    </div>
                  </div>
                  </div>
                </div>
                <div>
                </div>
            <?php
            }
        }
    }
            ?>
         <a href="<?php echo "../Faculty/uploadassign/" . $row['Assignment'] ?>" class="button mt-2 mb-3 ml-3" download>Download</a> <span><a href="viewAssignment.php" class="button mt-2">Back</a></span></span>
         <!-- <i class="fa fa-download icon-button mt-1" style="color:#28a745; margin-left:1pc"></i> -->
        <!-- <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
        <label for="floatingTextarea2">Comments</label>
        </div>
        <div class="mt-5">
            <button class="button">Comment</button>
        </div>  -->
    </div>
   </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<?php
}else{
    header('location:../error.php');
}
        ?>