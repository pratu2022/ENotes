<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
{
require("sidebar.php");
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
        <div class="container ">
        <h1 class="display-6">Notes</h1>
        <hr class="mt-3">
            <div class="row">
                <div class="col-md-12">
                <div class="row">
                        <?php
                        include("../connect.php");
                        $query = "SELECT * FROM tblsubject";
                        $query_run = mysqli_query($mysql, $query);
                        if (mysqli_num_rows($query_run) > 0) 
                        {
                            foreach ($query_run as $row) 
                            {
                                echo "
                                <div class='col-sm-4 mt-2'>
                                <div class='card bg-warning text-white mt-3 p-2' style='width: 22rem;'>
                                <div class='card-body'>
                                <h5 class='card-title'>$row[subject_name]</h5>
                                <h2>Total Notes</h2>
                                <h5>";
                               
                        ?>
                        <?php

                        $qs = "SELECT * FROM tblnotes WHERE sub_id = '$row[id]' AND Visibility = 'visible'";
                        $ttlstud = mysqli_query($mysql, $qs);

                        $rows = mysqli_num_rows($ttlstud);
                        echo $rows
                            ?>
                        </h5>
                        <form action="viewPNotes.php" method="post">
                            <input type="hidden" name="subname" value="<?php echo"$row[id]" ?>">
                            <?php
                            //echo"<div><input type='submit' name='view' value='View $row[subject_name] Notes' class='fa-solid fa-arrow-right mt-2'><i class=''></i></div>";
                            echo"<button type='submit'  class='icon-button' name='view' style='margin-left:17pc'><i class='fa-solid fa-arrow-right' style='color: #fff;'></i></button>";
                            ?>
                        </form>
                       

                    </div>
                </div>
			</div>
                <?php
                    
                    }
                }
                ?>
                         
                    </div> 
                </div>
                </div>
            </div>
        </div>
    </div>
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