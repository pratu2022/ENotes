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
    <script src="myajaxcourse.js"></script>
    <title>Document</title>
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
</head>
<body>


<nav class="navbar navbar-expand-lg bg-color py-2">
    <div class="container">
        <a class="navbar-brand text-white fw-bold" href="index.php">NoteSwap</a>
        <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler"
                data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#about">About</a>
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
                  <a class="nav-link " href="http://localhost/Project/LMS/index.php#online_services">Service</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="courses.php">Courses</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link "href="http://localhost/Project/LMS/index.php#contact" aria-disabled="true">Contact</a>
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

<!--hero section-->

<!-- <section class="bg-main bg-color hero-section">
    <div class="container">
        <div class="row mb-5 ">
            <div class="">
                <h1 class=" text-capitalize fw-bolder text-white">
                Courses
                </h1>
            </div>

            <div class="col-xl-6 xol-lg-6 col-md-12 col-12 order-0 order-lg-1 hero-image--section ">
                <div class="text-md-end text-center mb-5">

                    <video autoplay class="hero-video--section" loop muted src="./images/hero.mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div> -->

        <!-- </div>

    </div>
    <div class="custom-shape-divider-bottom-1684208460">
        <svg data-name="Layer 1" preserveAspectRatio="none" viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg">
            <path class="shape-fill"
                  d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
        </svg>
    </div>
</section>  -->


<!--hero section end -->

<!--service section-->

<!-- <section class=" services-section">
    <div class="container text-center common-title fw-bold">
        <h2 class="common-heading">What We Will Do</h2>
        <hr class="w-25 mx-auto ">
    </div>

    <div class="container mt-5">
        <div class="row g-5 ">
            <div class="col-xxl-4 col-lg-4 col-12 ">
                <div class=" card-box rounded-2 p-5 text-center">
                    <img alt="GIF Image" class="img-fluid" src="./images/link.gif" width="200px">

                    <h5 class="my-3 fw-normal ">Provide Best Notes</h5>
                    <p class="pe-3 mb-5">
                        Hunky dory barney fanny around up the duff no biggie loo cup of tea jolly good ruddy say arse!
                    </p>
                    <div class="  d-flex justify-content-center align-items-center ">
                        <a class="icon-span d-flex justify-content-center align-items-center rounded-circle mb-3"
                           href="/service.html">
                            <i class="fa-solid fa-arrow-right"> </i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4 col-lg-4 col-12  ">
                <div class=" card-box rounded-2 p-5 text-center shadow">
                    <img alt="GIF Image" class="img-fluid" src="./images/speaker.gif" width="200px">

                    <h5 class="my-3 fw-normal">Provide Best Assignments </h5>
                    <p class="pe-3 mb-5">
                        Hunky dory barney fanny around up the duff no biggie loo cup of tea jolly good ruddy say arse!
                    </p>
                    <div class="  d-flex justify-content-center align-items-center ">
                        <a class="icon-span d-flex justify-content-center align-items-center rounded-circle mb-3"
                           href="/service.html">
                            <i class="fa-solid fa-arrow-right"> </i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4 col-lg-4 col-12 ">
                <div class=" card-box rounded-2 p-5 text-center">
                    <img alt="GIF Image" class="img-fluid" src="./images/seo.gif" width="200px">
                    <h5 class="my-3 fw-normal "> Best Faculties For Help </h5>
                    <p class="pe-3 mb-5">
                        Hunky dory barney fanny around up the duff no biggie loo cup of tea jolly good ruddy say arse!
                    </p>
                    <div class="  d-flex justify-content-center align-items-center ">
                        <a class="icon-span d-flex justify-content-center align-items-center rounded-circle mb-3"
                           href="/service.html">
                            <i class="fa-solid fa-arrow-right"> </i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section> -->

<!--service section-->

<!-- <section class="more-info-section bg-color">

    <section class="container ">
        <div class="row">
            <div class="col-xl-6 xol-lg-6 col-md-12 col-12 img-section">
                <figure>
                    <img alt="mobile chat" class="img-fluid" width="100px" src="./images/phone.gif">
                </figure>
            </div>

            <div class="col-xl-6 xol-lg-6 col-md-12 col-12  d-flex flex-column justify-content-center align-items-start ">

                <h1 class="common-heading text-capitalize fw-bolder text-white">
                    Steps to Build a <br> Successful Digital Notes
                </h1>
                <p class="mt-3 mb-5 para-width text-light-grey">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Quis ipsum suspendisse ultrices gravi.Risus commodo viverra maecenas accumsan lacus vel facilisis
                    orem ipsum dolor sit amet, consectetur adipiscing.
                </p>

                <button class="button">Contact Us</button>
            </div>


        </div>
    </section>
</section> -->




                      
<div class="col-md-4 ms-auto"> 
  <select class="form-select mt-3 w-75" aria-label="Default select example" name="type" id="type" onchange="myfunc2()">
  <option selected disabled>Select Subject Type</option>
  <?php
 include("connect.php");
$query = "SELECT DISTINCT subject_type FROM tblsubject";
 $query_run = mysqli_query($mysql, $query);
if (mysqli_num_rows($query_run) > 0) {
foreach ($query_run as $row) {
echo"<option value='$row[subject_type]'>$row[subject_type]</option>";   
}
}
?>
</select>
      <?php
     // Get the current year
     $currentYear = date("Y");

    // Define the range of years you want to display (e.g., from current year to 10 years ago)
    $startYear = $currentYear;
    $endYear = $currentYear - 10;

    // Generate an array of years
    // $years = range($startYear, $endYear);
    $years = range($endYear, $startYear);

    // Reverse the array to have the years displayed in descending order
    $years = array_reverse($years);
    ?>
     <select class="form-select mt-3 w-75" name="year" id="year" onchange="myfunc1()">
      <option selected disabled>Select Academic Year</option>
        <?php foreach ($years as $year): ?>
      <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
      <?php endforeach; ?>
      </select></div>
  </div>


  

<!-- Pricing section -->
<section class="common-section blog-section">
    <div class="common-heading container text-center common-title  ">
        <h2 class="common-heading">Courses<br></h2>
        <hr class="w-25 mx-auto">
    </div>


    <?php
    include("connect.php");
    $query = "SELECT * FROM tblsubject LIMIT 4";
    $query_run = mysqli_query($mysql, $query);
    ?>
    <div class="container">
        <div class="row" id="tbody">
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
                                <p class="small text-grey "><?php  echo $row['ac_year']?></p>
                            </div>
                            <h5 class="card-title mt-3"><?php  echo $row['subject_name']?></h5>

                            <p class="card-text mt-2 mb-3"><?php  echo $row['allocated_faculty']?></p>
                            <!-- <a class="px-4 py-2 btn btn-dark" href="#">Read More</a> -->
                        </div>
                    </div>
                </div>
            </div>
 <?php
            }}
?>
          </div> 
          <ul class="pagination mt-5">
          <?php
          include_once("connect.php");
          $sql1="select * from tblsubject";
          $result1=mysqli_query($mysql,$sql1);
          $total=mysqli_num_rows($result1);
          
          $limit=3;
          
          $paginate=ceil($total/$limit); 
  for($i=1;$i<=$paginate;$i++)  
{?>
  <li class="page-item" id="page<?php echo $i;?>" onclick="pagination(<?php echo $i;?>,this.id)"><a class="page-link" href="javascript:void(0)"><?php echo $i;?></a></li>
<?php } ?> 
</ul>
    </div> 
           

</section>








<!--footer section-->

<footer class="main-footer-section">
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
                            <h4 class="mt-5 mb-3 text-white">Subscribe</h4>
                            <div class="input-group mb-3 w-75">
                                <input type="text" class="form-control" style=" border-radius: 20px 0px 0px 20px;" placeholder="Recipient's username"
                                       aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <span class="button" id="basic-addon2">Subscribe</span>
                            </div>
                            <h4 class="text-white mt-5 mb-3">About</h4>
                            <ul class="text-light-grey list-unstyled d-flex flex-column gap-2">
                                <li>About Us</li>
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


<!--footer sectoin ends -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
</body>
</html>