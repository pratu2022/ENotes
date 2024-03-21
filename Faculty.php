<?php
include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Load More</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<style>
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

<nav class="navbar navbar-expand-lg bg-color ">
    <div class="container">
        <a class="navbar-brand text-white fw-bold" href="#">NoteSwap</a>
        <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler"
                data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#home">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Admin/aboutus.php">About</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Login
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Faculty</a>
                    </li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#example">Student</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#admin">Admin</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="#online_services">Service</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="Faculty.php">Faculties</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="courses.php">Courses</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="#contact" aria-disabled="true">Contact</a>
                </li>
              </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5  text-center" id="exampleModalLabel" style="color:#614385">FACULTY</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action ="Admin/adminlogin.php" method="POST">
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label" style="color:#614385">Username</label>
              <input type="text" class="form-control" id="recipient-name" name="fac_username">
            </div>
            <div class="mb-3">
            <label class="col-form-label" style="color:#614385">Password</label>
              <input type="password" name="fac_password" class="form-control" >
            </div>
           </div>
           <div class="mx-auto p-3" >
            <input type="submit" value="Login" class="button" name = "faculty_login" style="width:10pc">
          </div>
        <div class="modal-footer">
          <div>
           <a href="" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#forgotfaculty">Forgot password?</a>
           </div>
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="forgotfaculty" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel" style="color:#614385">Forgot Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="forgotpasswordfaculty.php" method="POST">
              <div class="modal-body">
                <div class="form-group">
              <input type="email" class="form-control" placeholder="Enter email" name="faculty_email" placeholder="Enter Email">
            </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="button" name="fac-send-reset-link">SEND LINK</button>
              </div>
              </form>
            </div>
          </div>
        </div>


  <div class="modal fade" id="example" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5  text-center" id="exampleModalLabel" style="color:#614385">STUDENT</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action ="Admin/adminlogin.php" method="POST">
            <div class="mb-3">
              <label class="col-form-label" style="color:#614385">Username</label>
              <input type="text" class="form-control" name="student_username">
            </div>
            <div class="mb-3">
              <label class="col-form-label" style="color:#614385">Password</label>
              <input type="password" name="student_password" class="form-control" >
            </div>
        </div>
        <div class="mx-auto p-3">
            <input type="submit" value="Login" class="button" name = "student_login" style="width:10pc">
        </div>
        <div class="modal-footer">
          <a href="" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#forgotstudent">Forgot password?</a>
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="forgotstudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel" style="color:#614385">Forgot Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="forgotpasswordstudent.php" method="POST">
              <div class="modal-body">
                <div class="form-group">
              <input type="email" class="form-control" placeholder="Enter email" name="student_email" placeholder="Enter Email">
            </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="button" name="stud-send-reset-link">SEND LINK</button>
              </div>
              </form>
            </div>
          </div>
        </div>

<div class="modal fade" id="admin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5  text-center" id="exampleModalLabel" style="color:#614385">Admin</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action ="Admin/adminlogin.php" method="POST">
            <div class="mb-3">
              <label class="col-form-label" style="color:#614385">Username</label>
              <input type="text" class="form-control" name="admin_username">
            </div>
            <div class="mb-3">
              <label class="col-form-label" style="color:#614385">Password</label>
              <input type="password" name="admin_password" class="form-control" >
            </div>
         
        </div>
        <div class="modal-footer">
          <input type="submit" value="Login" class="button" name = "admin_login">
        </div>
        </form>
      </div>
    </div>
  </div>



<!-- Pricing section -->
<section class="common-section blog-section">
    <div class="common-heading container text-center common-title ">
        <h2 class="common-heading mt-5">Faculties<br></h2>
        <hr class="w-25 mx-auto">
    </div>

    <div class="container my-4">
        <div class="row g-5" id="content">
        <?php
            include("connect.php");
            $query = "select * from tblfaculty limit 0,4";
            $query_run = mysqli_query($mysql, $query);
            ?>
        <?php
         if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $row) {
        ?>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="card" style="width: 18rem;">
                        <!-- <img alt="..."
                             class="card-img-top" src="./images/1.png"> -->
                        <div class="card-body">
                            <div class="d-flex justify-content-between">

                                <p class="small text-grey "><i class="fa-solid fa-book-open-reader"></i></p>
                                <p class="small text-grey "><?php  echo $row['regno']?></p>
                            </div>
                            <h5 class="card-title mt-3"><?php  echo $row['fac_name']?></h5>

                            <p class="card-text mt-2 mb-3"><?php  echo $row['fac_phone']?></p>
                        </div>
                    </div>
                </div>
            </div>
 <?php
            }}
?>
</section>



<div class="row">
<div class="col-xl-12">

<p class="text-center"><button type="button" class="button" id="loadmore">Load More...</button></p>

<input type="hidden" id="start" value="0">

</div>
</div>
 
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>

$("#loadmore").click(function()
{
	 $start=parseInt($("#start").val());
	 $perpage=3;
	 
	 $start=$start+$perpage;
	 
	 $("#start").val($start);
	 
	 $.ajax({
		 
		 url:'Facultydata.php',
		 method:'POST',
		 data:{'starting':$start},
		 success:function(response)
		 {
			 if(response!='')
			 {
			 $("#content").append(response);
			 }
			 else 
			 {
				 $("#loadmore").text('Data has Finished');
				 $("#loadmore").slideUp(2000);
				 
			 }
		 }
		 
	 })
	 
})

</script>
<footer class="main-footer-section mt-5">
        <div class="footer-section py-5 text-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-6 col-6">
                        <div class="footer-links">
                            <h4 class="text-white mt-5 mb-3">Administration office</h4>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7440.639218419649!2d72.79733804018001!3d21.179458826206744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04ded06cb9647%3A0x42f1f4e6971d85e9!2sAthwalines%2C%20Athwa%2C%20Surat%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1710609745049!5m2!1sen!2sin" width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 col-6">
                        <div class="footer-links">
                           
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 col-6">
                        <div class="footer-links">
                            
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="footer-links">
                            <!-- <h4 class="mt-5 mb-3 text-white">Subscribe</h4> -->
                            <!-- <div class="input-group mb-3 w-75">
                                <input type="text" class="form-control" style=" border-radius: 20px 0px 0px 20px;" placeholder="Recipient's username"
                                       aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <span class="button" id="basic-addon2">Subscribe</span>
                            </div> -->
                            <h4 class="text-white mt-5 mb-3">About</h4>
                            <ul class="text-light-grey list-unstyled d-flex flex-column gap-2 mt-5">
                                <a href="Admin/aboutus.php" style="text-decoration:none;color:#fff;">About Us</a>
                                <li>Privacy Policy</li>
                                <li>Noteswap Teams</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <hr class="container mx-auto">

            <div class="row">
                <div class="col-lg-8 col-12 ">
                    Copyright ©2023 All rights reserved.
                </div>
                <div class="col-md-4 col-12  ">
                    <div class="d-flex justify-content-center justify-content-lg-end gap-5 mt-lg-0 mt-3">
                        <a href="https://www.instagram.com/thapatechnical/" target="_blank">
                            <div class="icon-span d-flex justify-content-center align-items-center rounded-circle mb-3">
                                <i class="fa-brands fa-instagram"></i>
                            </div>
                        </a>
                        <div class="icon-span d-flex justify-content-center align-items-center rounded-circle mb-3">
                            <i class="fa-brands fa-whatsapp"></i>
                        </div>
                        <div class="icon-span d-flex justify-content-center align-items-center rounded-circle mb-3">
<!--                            <i class="fa-brands fa-whatsapp"></i>-->
                            <i class="fa-brands fa-twitter"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
