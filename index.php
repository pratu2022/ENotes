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

<!--   plx download the images, gifs from Pixcap Website here http://bit.ly/3zJ49Q7 -->

<nav class="navbar navbar-expand-lg bg-color py-4 pt-lg-5">
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
                  <a class="nav-link " href="#online_services">Service</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " aria-disabled="true">Contact</a>
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

<section class="bg-main bg-color hero-section">
    <div class="container">
        <div class="row mb-5 ">
            <div class="d-flex flex-column align-items-start justify-content-center col-xl-6 xol-lg-6 col-md-12 col-12 order-1 order-lg-0 text-md-start text-center">
                <h1 class=" text-capitalize fw-bolder text-white">
                We've summarized and analyzed every book on your syllabus.
                </h1>
                <p class="mt-3 mb-5  para-width text-light-grey ">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Quis ipsum suspendisse ultrices gravi.
                </p>

                <div class="text-center w-100 text-md-start">
                    <button class="button pb-2" data-bs-offset="0,5" data-bs-placement="top"
                            data-bs-title="Get Best Services" data-bs-toggle="tooltip">Contact Us
                    </button>
                </div>

            </div>

            <div class="col-xl-6 xol-lg-6 col-md-12 col-12 order-0 order-lg-1 hero-image--section ">
                <div class="text-md-end text-center mb-5">

                    <video autoplay class="hero-video--section" loop muted src="./images/hero.mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>

        </div>

    </div>
    <div class="custom-shape-divider-bottom-1684208460">
        <svg data-name="Layer 1" preserveAspectRatio="none" viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg">
            <path class="shape-fill"
                  d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
        </svg>
    </div>
</section>


<!--hero section end -->

<!--service section-->

<section class=" services-section">
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

</section>

<!--service section-->

<section class="more-info-section bg-color">

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
</section>



<section class="common-section business-section" id="online_services">
    <div class="container text-center fw-bold common-title">
        <h2 class="common-heading">Facilities<br></h2>
        <hr class="w-25 mx-auto ">
    </div>

    <div class="container">
        <div class="row g-5">
            <div class="col-xl-6 col-md-12 ">
                <div class="d-flex  px-3 py-5 shadow ">
                    <img alt="GIF Image" class=" d-md-block d-none  img-fluid mx-3" src="./images/phone.gif"
                         width="150px">

                    <div class="row ">
                        <p class="mb-3 fw-bolder">Notes are  Manage in Pdf/Video/Document Form</p>
                        <p> Reach a wider audience by creating engaging ads on platforms like Facebook, Instagram and
                            LinkedIn. Target specific demographics to connect with potential customers interested in
                            your services. </p>
                    </div>
                </div>
            </div>
            

            <div class="col-xl-6 col-md-12 ">
                <div class="d-flex  px-3 py-5 shadow ">
                    <img alt="GIF Image" class=" d-md-block d-none  img-fluid mx-3" src="./images/online.gif"
                         width="150px">

                    <div class="row ">
                        <p class="mb-3 fw-bolder">Assignments are Manage in Pdf Form</p>
                        <p>Partner with influential individuals or bloggers in your industry to tap into their audience.
                            Through sponsored posts or endorsements, you can generate interest and attract new customers
                            to your online channels. </p>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-12 ">
                <div class="d-flex  px-3 py-5 shadow ">
                    <img alt="GIF Image" class=" d-md-block d-none  img-fluid mx-3" src="./images/online.gif"
                         width="150px">

                    <div class="row ">
                        <p class="mb-3 fw-bolder">Announcements</p>
                        <p>Publish valuable and optimized content on your website's blog. Attract organic traffic,
                            position your brand as an authority, and encourage visitors to engage and make a
                            purchase. </p>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-12 ">
                <div class="d-flex  px-3 py-5 shadow ">
                    <img alt="GIF Image" class=" d-md-block d-none  img-fluid mx-3" src="./images/phone.gif"
                         width="150px">

                    <div class="row ">
                        <p class="mb-3 fw-bolder">View User Status</p>
                        <p>Implement a customer referral program. Incentivize existing customers to refer others with
                            rewards like discounts or loyalty points. Word-of-mouth marketing helps acquire new
                            customers.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<!--testimonial section -->
<section class="common-section mb-5 pt-5 bg-color">
    <div class="container text-center common-title  ">
        <h2 class="common-heading text-white">Top Faculties<br></h2>
        <hr class="w-25 mx-auto">
    </div>


    <div class="container">
        <div class="carousel slide" data-bs-ride="true" id="carouselExampleIndicators">
            <div class="carousel-indicators">
                <button aria-current="true" aria-label="Slide 1" class="active" data-bs-slide-to="0"
                        data-bs-target="#carouselExampleIndicators" type="button"></button>
                <button aria-label="Slide 2" data-bs-slide-to="1" data-bs-target="#carouselExampleIndicators"
                        type="button"></button>
                <button aria-label="Slide 3" data-bs-slide-to="2" data-bs-target="#carouselExampleIndicators"
                        type="button"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row g-4">
            <?php
            include("connect.php");
            $query = "SELECT * FROM tblfaculty LIMIT 3";
            $query_run = mysqli_query($mysql, $query);
            ?>
            <?php
         if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $row) {
        ?>
                        
                        <div class="col-xxl-4">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="card  p-3" style="width: 18rem; ">
                                    <img alt="..."
                                         class="card-img-top"
                                         src="<?php echo "Admin/uploadf/" . $row['fac_image'] ?>" style="border-radius:70rem;">
                                    <div class="card-body text-center">
                                        <p class="card-title  mb-3 "><?php echo $row['fac_name'] ?></p>
                                        <p class="card-text ">Some quick example text to build on the card title and
                                            make
                                            up
                                            the bulk of the card's content.</p>
                                        <div class=" mt-3 d-flex justify-content-center">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php  }}?>

                        <!-- <div class="col-xxl-4">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="card  p-3" style="width: 18rem;">
                                    <img alt="..."
                                         class="card-img-top"
                                         src="https://images.pexels.com/photos/3763188/pexels-photo-3763188.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
                                    <div class="card-body text-center">
                                        <p class="card-title  mb-3">Angelina Thapa</p>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up
                                            the bulk of the card's content.</p>
                                        <div class=" mt-3 d-flex justify-content-center">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="card  p-3" style="width: 18rem;">
                                    <img alt="..."
                                         class="card-img-top"
                                         src="https://images.pexels.com/photos/3763188/pexels-photo-3763188.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
                                    <div class="card-body text-center">
                                        <p class="card-title  mb-3">Angelina Thapa</p>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up
                                            the bulk of the card's content.</p>
                                        <div class=" mt-3 d-flex justify-content-center">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="carousel-item">
                    <div class="row g-4">
                        <div class="col-xxl-4">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="card  p-3" style="width: 18rem;">
                                    <img alt="..."
                                         class="card-img-top"
                                         src="https://images.pexels.com/photos/3763188/pexels-photo-3763188.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
                                    <div class="card-body text-center">
                                        <p class="card-title  mb-3">Angelina Thapa</p>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up
                                            the bulk of the card's content.</p>
                                        <div class=" mt-3 d-flex justify-content-center">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="card  p-3" style="width: 18rem;">
                                    <img alt="..."
                                         class="card-img-top"
                                         src="https://images.pexels.com/photos/3763188/pexels-photo-3763188.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
                                    <div class="card-body text-center">
                                        <p class="card-title  mb-3">Angelina Thapa</p>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up
                                            the bulk of the card's content.</p>
                                        <div class=" mt-3 d-flex justify-content-center">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="card  p-3" style="width: 18rem;">
                                    <img alt="..."
                                         class="card-img-top"
                                         src="https://images.pexels.com/photos/3763188/pexels-photo-3763188.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
                                    <div class="card-body text-center">
                                        <p class="card-title  mb-3">Angelina Thapa</p>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up
                                            the bulk of the card's content.</p>
                                        <div class=" mt-3 d-flex justify-content-center">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row g-4">
                        <div class="col-xxl-4">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="card  p-3" style="width: 18rem;">
                                    <img alt="..."
                                         class="card-img-top"
                                         src="https://images.pexels.com/photos/3763188/pexels-photo-3763188.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
                                    <div class="card-body text-center">
                                        <p class="card-title  mb-3">Angelina Thapa</p>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up
                                            the bulk of the card's content.</p>
                                        <div class=" mt-3 d-flex justify-content-center">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                      

                        <!-- <div class="col-xxl-4">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="card  p-3" style="width: 18rem;">
                                    <img alt="..."
                                         class="card-img-top"
                                         src="https://images.pexels.com/photos/3763188/pexels-photo-3763188.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
                                    <div class="card-body text-center">
                                        <p class="card-title  mb-3">Angelina Thapa</p>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up
                                            the bulk of the card's content.</p>
                                        <div class="d-flex justify-content-center">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselExampleIndicators"
                    type="button">
                <span aria-hidden="true" class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#carouselExampleIndicators"
                    type="button">
                <span aria-hidden="true" class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


</section>


<!--testimonail section ends-->
<?php
 include("connect.php");
$query = "SELECT * FROM tblsubject";
$query_run = mysqli_query($mysql, $query);
 ?>
<!-- Pricing section -->
<section class="common-section blog-section">
    <div class="common-heading container text-center common-title  ">
        <h2 class="common-heading"> Courses<br></h2>
        <hr class="w-25 mx-auto">
    </div>

    <div class="container my-5">
        <div class="row g-5  ">
        <?php
         if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $row) {
        ?>
            <div class="col-xl-3 col-md-6 col-12 ">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="card" style="width: 18rem;">
                        <!-- <img alt="..."
                             class="card-img-top" src="./images/1.png"> -->
                        <div class="card-body">
                            <div class="d-flex justify-content-between">

                                <p class="small text-grey "><i class="fa-solid fa-book-open-reader"></i></p>
                                <p class="small text-grey "> March 3, 2020 </p>
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
           

</section>

<!--    pricing section end -->


<!--contact section-->
<section class="common-section bg-color contact-section text-white">
    <div class="custom-shape-divider-top-1684211116">
        <svg data-name="Layer 1" preserveAspectRatio="none" viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg">
            <path class="shape-fill"
                  d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
        </svg>
    </div>

    <div class="container text-center fw-bold common-title " id="">
        <h2 class="common-heading text-white ">Contact Us</h2>
        <hr class="w-25 mx-auto">
    </div>

    <div class="container ">
        <div class="form-section  mx-auto">
            <form action="Admin/contact.php" method="post">
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label class="form-label" for="first-name">First name</label>
                            <input class="form-control" name="fname" id="first-name" placeholder="First name" 
                                   aria-label="First name" type="text" required>
                        </div>
                        <div class="col">
                            <label for="last-name" class="form-label">Last name</label>
                            <input type="text" name="lname" class="form-control" id="last-name" placeholder="Last name" 
                                   aria-label="Last name" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email"  name="email"class="form-control" id="exampleInputEmail1" required
                           placeholder="Enter your email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text text-white">We'll never share your email with anyone else.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="message" required
                              placeholder="Enter your message " rows="3"></textarea>
                </div>

                <button type="submit" class="button" name="contact_submit">Submit</button>
            </form>
        </div>
    </div>

</section>




<!--contact section end -->


<!--footer section-->

<footer class="main-footer-section">
    <div class="contact-details">
        <div class="container px-5">
            <div class="row g-0">
                <div class="col-lg-4 ">
                    <div class="contact-div p-5 d-flex flex-column justify-content-center align-items-center">
                        <div class="icon-div d-flex justify-content-center align-items-center rounded-circle mb-3">
                            <img src="./images/call.gif" alt="GIF Image" class="img-fluid">
                        </div>
                        <p class="text-white">(+00) 1234 5678</p>
                    </div>
                </div>

                <div class="col-lg-4 ">
                    <div class="contact-div p-5 d-flex flex-column justify-content-center align-items-center">
                        <div class="icon-div d-flex justify-content-center align-items-center rounded-circle mb-3">
                            <!--                            <i class="fa-solid fa-phone"></i>-->
                            <img src="./images/email.gif" alt="GIF Image" class="img-fluid">
                        </div>
                        <p class="text-white">(+00) 1234 5678</p>
                    </div>
                </div>

                <div class="col-lg-4 ">
                    <div class="contact-div p-5 d-flex flex-column justify-content-center align-items-center">
                        <div class="icon-div d-flex justify-content-center align-items-center rounded-circle mb-3">
                            <img src="./images/map.gif" alt="GIF Image" class="img-fluid">
                        </div>
                        <p class="text-white">(+00) 1234 5678</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-section py-5 text-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-6 col-6">
                        <div class="footer-links">
                            <h4 class="text-white mt-5 mb-3">About</h4>
                            <ul class="text-light-grey list-unstyled d-flex flex-column gap-2">
                                <li>Our Story</li>
                                <li>Our Story</li>
                                <li>Our Story</li>
                                <li>Our Story</li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 col-6">
                        <div class="footer-links">
                            <h4 class="text-white mt-5 mb-3">About</h4>
                            <ul class="text-light-grey list-unstyled d-flex flex-column gap-2">
                                <li>Our Story</li>
                                <li>Our Story</li>
                                <li>Our Story</li>
                                <li>Our Story</li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 col-6">
                        <div class="footer-links">
                            <h4 class="text-white mt-5 mb-3">About</h4>
                            <ul class="text-light-grey list-unstyled d-flex flex-column gap-2">
                                <li>Our Story</li>
                                <li>Our Story</li>
                                <li>Our Story</li>
                                <li>Our Story</li>

                            </ul>
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