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
  <title>view Profile</title>
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
<h1 class="display-6">Profile</h1>
    <hr class="mt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
  <?php
  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    echo "
            <div class='card mt-3' style='width: 50rem;'>
            <div class='row'>
            <div class='col-md-6 p-5'>
            <img src= '../Admin/uploadf/$_SESSION[image]' class='card-img-top' >
            </div>
            <div class='col-md-6 p-5'>
             <div class='p-2'>
             <h3>$_SESSION[name]</h3>
             <p class='text-muted'>$_SESSION[regno]<br></p>
             <p class='fs-6 fw-bolder'>Username: $_SESSION[username]<br>Gender: $_SESSION[gender]<br>Email: $_SESSION[email]<br>Address: $_SESSION[address]</p>
             </div>
             <input type='submit' value='Change Password' data-bs-toggle='modal' data-bs-target='#changepassword' class='button'>
            </div>
            </div>
</div>";
  } 
  else {
    echo '<div class="buttons ms-auto">
              <input type="button"  value="Login" class="button"  data-bs-toggle="modal" data-bs-target="#login">
            </div>';
  }
  ?>
  </div>
  
</div>
</div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>

    <div class="modal fade" id="changepassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Change Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="facultychangepassword.php" method="POST">
              <div class="modal-body">
                <div class="form-group">
              <input type="email" class="form-control" placeholder="Enter email" name="faculty_email" placeholder="Enter Email" required>
            </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="button" name="fac-send-reset-link">SEND LINK</button>
                
              </div>
              </form>
            </div>
          </div>
        </div>
</body>
</html>
<?php
}
else
{
    header('location:../error.php');
}
?>