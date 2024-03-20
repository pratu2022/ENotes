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
<script src="myajaxadmincourse.js"></script>    
<title>Document</title>
    <style>
     #content {
        margin-left: 250px;
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
<h1 class="display-6">Courses</h1>
<hr class="mt-3">
<div class="container">
    <div class="row">
        <div class="col-sm-4">
<select class="form-select mt-3 w-75" aria-label="Default select example" name="type" id="type" onchange="myfunc2()">
  <option selected disabled>Select Subject Type</option>
  <?php
 include("../connect.php");
$query = "SELECT DISTINCT subject_type FROM tblsubject";
 $query_run = mysqli_query($mysql, $query);
if (mysqli_num_rows($query_run) > 0) {
foreach ($query_run as $row) {
echo"<option value='$row[subject_type]'>$row[subject_type]</option>";   
}
}
?>
</select>
</div>
<div class="col-sm-4">
<select class="form-select mt-3 w-75" aria-label="Default select example" name="faculty" id="faculty" onchange="myfunc3()">
  <option selected disabled>Select Faculty</option>
  <?php
 include("../connect.php");
$query = "SELECT DISTINCT allocated_faculty FROM tblsubject";
 $query_run = mysqli_query($mysql, $query);
if (mysqli_num_rows($query_run) > 0) {
foreach ($query_run as $row) {
echo"<option value='$row[allocated_faculty]'>$row[allocated_faculty]</option>";   
}
}
?>
</select>

</div>
<div class="col-sm-4">
<?php
$currentYear = date("Y");
$startYear = $currentYear;
$endYear = $currentYear - 10;
$years = range($endYear, $startYear);
$years = array_reverse($years);
?>
 <select class="form-select mt-3 w-75" name="year" id="year" onchange="myfunc1()">
      <option selected disabled>Select Academic Year</option>
        <?php foreach ($years as $year): ?>
      <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
      <?php endforeach; ?>
</select>

</div>
    </div>
</div>
</div>


  

<!-- Pricing section -->
<div id="content">  
<section class="common-section blog-section">

<?php
 include("../connect.php");
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

                                <p class="small text-grey "><i class="fa-solid fa-book-open-reader fa-xl" style="color: #614385;"></i></p>
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
          include_once("../connect.php");
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