<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
{
 require("sidebar.php");
include('../connect.php');
?>

<?php 
          
          function commenttree($parentid=NULL)
          {
            $notes_id = $_GET['id'];
  
            if(is_null($parentid))
            {
              // $sql = "SELECT * FROM comments WHERE assign_id= $assign_id AND comment_id= 0";
              $sql="select * from comments_notes where notes_id= $notes_id AND comment_id = 0";
              //echo $sql;
  
            }
            else{
              $sql = "SELECT * FROM comments_notes WHERE notes_id= $notes_id AND comment_id=$parentid";
            }
  
            $result = mysqli_query($GLOBALS['mysql'],$sql);
             $comments = '';
            while($data=mysqli_fetch_array($result))
            {
              if($data['comment_id']==0)
              {
  
             
                $comments.='<div class="media border p-3 mb-2">
                <div class="media-body">
                  <h6>'.$data['name'].' <small class="text-muted"><i>Posted on '.$data['register_date'].'</i></small></h6>
                  <p>'.$data['description'].'</p>
                
                <p class="text-right"><a href="#postcomment" class="btn btn-primary" onclick="reply('.$data['id'].')">Reply</a></p>
                
                
            </div>
            </div> ';
       

         //echo $comments;
        }
        else{
          $comments.='<div class="card ms-auto w-75 p-3 mb-2">
          <div class="card-body">
            <h6>'.$data['name'].' <small  class="text-muted"><i>Replied on '.$data['register_date'].'</i></small></h6>
            <p>'.$data['description'].'</p>
          
              <p class=""><a href="#postcomment" class="btn btn-danger" onclick="reply('.$data['id'].')">Reply</a></p>
          
      </div>
      </div>';	
        }
        $comments.='<div class="media pl-3 mb-2">
        <div class="media-body">
         
		  '.commenttree($data['id']).'
		 
        </div>
      </div> ';
       
            }
            return $comments;
          }

        

          // function end

        if(isset($_POST['submit_assign']))
        {
          $notes_id = $_GET['id'];
          if(empty($_POST['commentid']))
          {
            $commentid = 0;
          }
          else
          {
            $commentid = $_POST['commentid'];
          }
          //$sql = "INSERT INTO `comments_notes`(`id`,`notes_id`, `comment_id`, `name`, `description`) VALUES (null,'$notes_id','$commentid','$_POST[name]','$_POST[comment]')";
          $sql = "INSERT INTO `comments_notes`(`id`, `notes_id`, `comment_id`, `name`, `description`) VALUES ('null','$notes_id','$commentid','$_POST[name]','$_POST[comment]')";
          //echo $sql;
          $result = mysqli_query($GLOBALS['mysql'],$sql);
          echo $result;
          if($result)
          {
            ?>
            <script>
            alert("add Successfully");
            </script>
            <?php
          }
          else
          {
            ?>
            <script>
              alert("error");
            </script>
            <?php
          }
        }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Notes</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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
        <h1 class="display-6">Notes Description</h1>
        <hr class="mt-3">
        <?php
             include("../connect.php");
             $id = $_GET['id'];
             $query = "SELECT * FROM tblnotes WHERE  UploadedBy = '$_SESSION[name]' AND srno ='$id'";
           // $query = "SELECT * FROM tblnotes WHERE  srno= '$id'";
            $query_run = mysqli_query($mysql,$query);
            ?>

              <?php

            if(mysqli_num_rows($query_run) > 0)
            {
            foreach($query_run as $row)
            {
            ?>
                <p class="text-muted"><?php  echo $row['Uploadedon']?></p>
                <p><?php echo $row['Description']?></p>
                    <!-- <div class="col-2">
                    <a href="<?php echo "../Faculty/uploadnotes/" . $row['Notes'] ?>" class="icon-button" download><i class="fa fa-download icon-button mt-2" style="color:#28a745;"></i></a>
                    </div> -->
                    <div class="col-12">
                   
                    <?php 
                      $pd = "../Faculty/uploadnotes/" . $row['Notes'];
                        if($row['Type'] == 'pdf' || $row['Type'] == 'docx')
                        {
                           if($row['Type'] == 'pdf'){
                            ?>
                            <div class="card w-25">
                            <div class="card-body">
                            <div class="row">
                            <embed src="<?php echo "../Faculty/uploadnotes/" . $row['Notes'] ?>" type="application/pdf"  frameborder="0" />
                            <?php
                           }
                           else
                           {
                            ?>
                            <div class="card w-25">
                            <div class="card-body">
                            <div class="row">
                            <img src="../images/docx.png" alt="" >
                            <?php
                           }
                        }
                        else{
                            // echo "Video";
                            ?>
                            <div class="card w-25 mb-2">
                            <div class="card-body">
                            <div class="row">
                            <video width="400" controls>
                            <source src="<?php echo "../Faculty/uploadnotes/" . $row['Notes'] ?>" type="video/mp4">
                            </video>
                            <!-- <a href="<?php //echo "../Faculty/uploadnotes/" . $row['Notes'] ?>" class="icon-button" download><i class="fa fa-download icon-button mt-2" style="color:#28a745;"></i></a> -->
                            <?php
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
            ?>
          <div id="postcomment" class="p-5">
        <!-- <h4 id="commenttext">Comments</h4> -->
        <h4 id="commenttext">Reply:</h4>
        <form method="post">
          <input type="hidden" name="commentid" id="commentid">
        <div class="form-floating">
          <input type="text" class="form-control mb-2" name="name" id="floatingPassword" placeholder="Password" value="<?php echo $_SESSION['name'] ?>">
          <label for="floatingPassword">Name</label>
        </div>
        <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="comment"></textarea>
        <label for="floatingTextarea2">Comments</label>
        </div>
        <div class="mt-2 mb-2">
            <button type="submit" class="button" name="submit_assign">Reply</button>
        </div> 

        </form>
        <script>
         function reply(commentid) 
         {
           $("#commentid").val(commentid);
           $("#commenttext").text('Reply:');
          // var str = '<form method="post"><h4 id="commenttext"></h4><input type="hidden" name="commentid" id="commentid"><div class="form-floating"><input type="text" class="form-control mb-2" name="name" id="floatingPassword" placeholder="Password" value="<?php echo $_SESSION['name'] ?>"><label for="floatingPassword">Name</label></div><div class="form-floating"><textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="comment"></textarea><label for="floatingTextarea2">Comments</label></div><div class="mt-2 mb-2"><button type="submit" class="button" name="submit_assign">Comment</button></div></form>';
          // $("#postcomment").append(str);
         }
         </script>
        </div>
       
  <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        View Comments
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
          
        <?php 
  
  $commentdata=commenttree();
  
  echo $commentdata;
  
  ?> 
      </div>
    </div>
  </div>
       
       
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