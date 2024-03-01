<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
{
require("sidebar.php");
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <title>Hello, index</title>
</head>
<style>
  #content {
    margin-left: 250px;
    padding: 15px;
  }

  .cards{
    background-color: #614385;
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


</style>

<body>

  <div id="content">
  <h1 class="display-6">Dashboard</h1>
  <hr class="mt-3">
    <div class="container ">

      <!-- 1st -->
      <div class="row">
        <div class="col-sm-4">
          <div class="cards text-white mt-4" style="width: 18rem;" 
            >
            <div class="card-body p-4">
              <h5 class="card-title">Faculty</h5>
              <h2>Total Faculty</h2>
              <?php

              require("../connect.php");
              $qs = "SELECT id FROM tblfaculty ORDER BY id";
              $ttlfac = mysqli_query($mysql, $qs);

              $rows = mysqli_num_rows($ttlfac);
              echo $rows;

              ?>
              <!-- <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a> -->
            </div>
          </div>
        </div>
        <!-- 2nd -->
        <div class="col-sm-4">
          <div class="cards bg-danger text-white mt-4" style="width: 18rem;" >
            <div class="card-body p-4">
              <h5 class="card-title">Student</h5>
              <h2>Total Student</h2>
              <h5>
                <?php
                require("../connect.php");
                $qs = "SELECT regno FROM tblstudent ORDER BY regno";
                $ttlstud = mysqli_query($mysql, $qs);

                $rows = mysqli_num_rows($ttlstud);
                echo $rows
                  ?>
              </h5>
              <!-- <a href="#" class="card-link">Card link</a> -->
              <!-- <a href="#" class="card-link">Another link</a> -->
            </div>
          </div>
        </div>
        <!-- 3rd -->
        <div class="col-sm-4">
          <div class="cards bg-danger text-white mt-4" style="width: 18rem;">
            <div class="card-body p-4">
              <h5 class="card-title">Admin</h5>
              <h2>Total Admin</h2>
              <h5>
                <?php

                require("../connect.php");
                $qs = "SELECT id FROM tbladmin ORDER BY id";
                $ttladmin = mysqli_query($mysql, $qs);

                $rows = mysqli_num_rows($ttladmin);
                echo $rows;

                ?>
              </h5>
              <!-- <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a> -->
            </div>
          </div>
        </div>


          </div>
        </div>


        
      </div>
      </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
<?php
require("../connect.php");
$currentDate = date("Y-m-d");
$fac_date= "SELECT * FROM tblfaculty WHERE date = '$currentDate'";
// echo $qs;
$fac_ttl = "SELECT id FROM tblfaculty ORDER BY id";

 $fac_qdate = mysqli_query($mysql, $fac_date);
 $fac_qttl = mysqli_query($mysql, $fac_ttl);

 $facnrow = mysqli_num_rows($fac_qdate);
//  echo $facnrow;
 ?>
 <!-- <br/> -->
 <?php
 $factnrow = mysqli_num_rows($fac_qttl);
  // echo $factnrow;
 $perf = ($facnrow/$factnrow) * 100;
 ?>
 <!-- <br/> -->

<?php
require("../connect.php");
// $qs = "SELECT regno FROM tblstudent ORDER BY regno";
// $ttlstud = mysqli_query($mysql, $qs);
// $rowstud = mysqli_num_rows($ttlstud);
// echo $rowstud;
?>
<?php
require("../connect.php");
$currentate = date("Y-m-d");
$qss = "SELECT * FROM tblstudent WHERE date = '$currentate'";
// echo $qs;
$qtt = "SELECT id FROM tblstudent ORDER BY id";

 $ttlqss = mysqli_query($mysql, $qss);
 $ttlqtt = mysqli_query($mysql, $qtt);

 $rowqss = mysqli_num_rows($ttlqss);
//  echo $rowqss;
 ?>
 <!-- <br/> -->
 <?php
 $rowqtt = mysqli_num_rows($ttlqtt);
//  echo $rowqtt;
 $perstud = ($rowqss/$rowqtt) * 100;
 ?>

<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	exportEnabled: true,
	animationEnabled: true,
	title:{
		text: "Daily Registration of Faculites and Students"
	},
	legend:{
		cursor: "pointer",
		itemclick: explodePie
	},
	data: [{
		type: "pie",
		showInLegend: true,
		toolTipContent: "{name}: <strong>{y}%</strong>",
		indexLabel: "{name} - {y}%",
		dataPoints: [
			{ y: <?php echo $perf ?>, name: "Faculity", exploded: true },
			{ y:  <?php echo $perstud ?>, name: "Students" },
			{ y:  <?php $add = 100-($perf + $perstud); echo $add ?>, name: "Other" }

			
		]
	}]
});
chart.render();
}

function explodePie (e) {
	if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
	} else {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
	}
	e.chart.render();

}
</script>



<div id="chartContainer" class="mt-5" style="height: 300px; width: 700px; margin-left:29pc"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</html>
<?php
}
else
{
    header('location:../error.php');
}
?>