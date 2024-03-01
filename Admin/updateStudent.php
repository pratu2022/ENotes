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
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
    #content {
        margin-left: 250px;
        padding: 15px;
    }
    .card
    {
      box-shadow: 10px 10px 62px 0px rgba(0,0,0,0.75);
      -webkit-box-shadow: 10px 10px 62px 0px rgba(0,0,0,0.75);
      -moz-box-shadow: 10px 10px 62px 0px rgba(0,0,0,0.75);
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

<body>

    <div id="content">
    <h1 class="display-6">Student Profile</h1>
    <hr class="mt-3">
            <div class="container mt-2">
            <?php
             include("../connect.php");
             $id = $_GET['id'];
            $query = "SELECT * FROM tblstudent WHERE id ='$id'";
            $query_run = mysqli_query($mysql,$query);
            ?>

            <?php

            if(mysqli_num_rows($query_run) > 0)
            {
            foreach($query_run as $row)
            {
            ?>
                <div class="row">
                    <div class="col-md-12">
                         <div class="card mt-4" style="width: 50rem;">
                    <div class="card-body">
                        <div class="row">
                        <!-- First Column -->
                        <div class="col-md-6">
                            <!-- Content for the first column goes here -->
                            <img src="<?php echo "uploads/" . $row['stud_image'] ?>" alt="Profile Picture" class="img-fluid rounded-circle">
                        </div>
                        
                        <!-- Second Column -->
                        <div class="col-md-6">
                            <!-- Content for the second column goes here -->
                            <h5 class="card-title mt-5">Student Profile</h5>
                            <p class='text-muted'><br><?php  echo $row['regno']; ?></p>
                            <p class="card-text">
                                <?php  echo $row['stud_name']; ?>
                            </p>
                            <p><?php  echo $row['stud_phone']; ?><br/>
                            <?php  echo $row['stud_email']; ?><br/>
                            <?php  echo $row['stud_address']; ?><br/>
                            <?php  echo $row['stud_gender']; ?></p>
                            <button class="button mt-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="display:flex;">Edit Student</button>
                        </div>
                        </div>

                        <div class="col-md-12">
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasRightLabel">Student Registration</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                            <?php
                                     include("../connect.php");
                                     $id = $_GET['id'];
                                     $query = "SELECT * FROM tblstudent WHERE id ='$id'";
                                     $query_run = mysqli_query($mysql,$query);
                                     if(mysqli_num_rows($query_run) > 0)
                                     {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <img src="<?php echo "uploads/" . $row['stud_image'] ?>" alt="" width ="150" height="150">
                                            <form action="updatestuddb.php" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="stud_id" value="<?php  echo $row['id']; ?>">
                                            <div class="form-group mt-3">
                                                <input type="text" class="form-control" placeholder="Enter Student Name" required
                                                    name="stud_name"  value="<?php  echo $row['stud_name']; ?>"/>
                                            </div>
                                            <div class="form-group mt-3">
                                                <input type="phone" class="form-control"
                                                    placeholder="Enter Student Phone" name="stud_phone"  value="<?php  echo $row['stud_phone']; ?>" required/>
                                            </div>
                                            <div class="form-group mt-3">
                                                <input type="email" class="form-control"
                                                    placeholder="Enter Student Email" name="stud_email"   value="<?php  echo $row['stud_email']; ?>" required/>
                                            </div>
                                            <div class="form-group mt-3">
                                                <textarea name="stud_add"  cols="80" rows="3" class="form-control"
                                                    placeholder="Enter Student Address" required><?php  echo $row['stud_address']; ?></textarea>
                                            </div>

                                            <div class="form-group mt-3">
                                                <input type="text" class="form-control"
                                                    placeholder="Enter Username" name="stud_username"  value="<?php  echo $row['stud_username']; ?>" required/>
                                            </div>
                                            
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="stud_gender"
                                                    id="flexRadioDefault1"  value="<?php  echo $row['stud_gender']; ?>" required>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="stud_gender"
                                                    id="flexRadioDefault2"  value="<?php  echo $row['stud_gender']; ?>" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Female
                                                </label>
                                            </div>
                                            <div class="form-group mt-3">
                                                <input type="file" name="stud_images" id="upload_image"
                                                    class="form-control"
                                                    onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                                    <input type="hidden" name="stud_image_old" value="<?php  echo $row['stud_image']; ?>">   
                                            </div>
                                            
                                            <div class="form-group mt-3">
                                                <input type="submit" value="Update" class="button"
                                                    name="update_stud_image">
                                            </div>
                                        </form>
                                            <?php
                                        }
                                     }
                                     ?>
                                       
                            </div>
                            <?php
            }}
                            ?>
                        </div>
                    </div>
                    </div>

                    </div>
                </div>
                <!--  -->
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
