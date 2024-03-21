<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="../style.css">
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
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="aboutus.php">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="http://localhost/Project/LMS/index.php#online_services">Service</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="../courses.php">Courses</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="http://localhost/Project/LMS/index.php#contact" aria-disabled="true">Contact</a>
                </li>
              </ul>
        </div>
    </div>
</nav>


<?php
include("../connect.php");
$query = "SELECT * FROM tblabout WHERE Visibility = 'visible'  LIMIT 1";
$sql = mysqli_query($mysql, $query);
?>
<?php while($row= mysqli_fetch_array($sql)) { ?>
<div class="bg-light">
  <div class="container py-5">
    <div class="row h-100 align-items-center py-5">
      <div class="col-lg-6">
        <h1 class="display-4"><?php echo $row["abt_title"]; ?></h1>
        <!-- <p class="lead text-muted mb-0">Create a minimal about us page using Bootstrap 4.</p> -->
        <p class="lead text-muted"><?php echo $row["abt_para1"]; ?>
        </p>
      </div>
      <div class="col-lg-6 d-none d-lg-block"><img src="https://bootstrapious.com/i/snippets/sn-about/illus.png" alt="" class="img-fluid"></div>
    </div>
  </div>
</div>

<div class="bg-white py-5">
  <div class="container py-5">
    <div class="row align-items-center mb-5">
      <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
        <!-- <h2 class="font-weight-light">Lorem ipsum dolor sit amet</h2> -->
        <p class="font-italic text-muted mb-4"><?php echo $row["abt_para2"]; ?></p>
      </div>
      <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="https://bootstrapious.com/i/snippets/sn-about/img-1.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
    </div>
    <div class="row align-items-center">
      <div class="col-lg-5 px-5 mx-auto"><img src="https://bootstrapious.com/i/snippets/sn-about/img-2.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
      <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
        <!-- <h2 class="font-weight-light">Lorem ipsum dolor sit amet</h2> -->
        <p class="font-italic text-muted mb-4"><?php echo $row["abt_para3"]; ?></p>
      </div>
    </div>
  </div>
</div>
<?php } ?>


    

    </div>
  </div>
</div>


<footer class="bg-light pb-5">
  <div class="container text-center">
    <p class="font-italic text-muted mb-0">&copy;Copyrights NoteSwap All rights reserved.</p>
  </div>
</footer>
</body>
</html>