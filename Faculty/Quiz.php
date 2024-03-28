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
<!-- <li class="dropdown <?php if(@$_GET['q']==4 || @$_GET['q']==5) echo'active"'; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quiz<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="dash.php?q=4">Add Quiz</a></li>
            <li><a href="dash.php?q=5">Remove Quiz</a></li>
			
          </ul>
        </li> -->
        <div class="dropdown dropend">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Manage Quiz
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="Quiz.php?q=4">Add Quiz</a></li>
    <li><a class="dropdown-item" href="Quiz.php?q=5">Remove Quiz</a></li>
  </ul>
</div>

<div class="row">

<span class="title1" style="margin-left:40%;font-size:30px;"><b>Quiz Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"> <?php  if(@$_GET['q']==4) { ?><form class="form-horizontal title1" name="form" action="update.php" method="POST">
<fieldset>
<!-- Text input-->
<?php 
if(isset($_GET['status'])==1){
  ?>
  <div class="alert alert-success mt-2" role="alert">
  Uploaded Successfully
</div>
<?php
}
?>



<?php
// $result = mysqli_query($mysql,"SELECT * FROM tblquiz") or die('Error');
// echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
// <tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
// $c=1;
// while($row = mysqli_fetch_array($result)) {
// 	$title = $row['title'];
// 	$total = $row['total'];
// 	$sahi = $row['ryt'];
//  $time = $row['time'];
// 	$eid = $row['eid'];
// 	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
// 	<td><b><a href="update.php?q=rmquiz&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';
// }
// $c=0;
// echo '</table></div></div>';
?>

<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <select class="form-select " aria-label="Default select example" name="title" placeholder ="Select Title">
    <option selected disabled>Select Title</option>
         <?php
        include("../connect.php");
       $query = "SELECT * FROM tblsubject WHERE allocated_faculty = '$_SESSION[name]'";
        $query_run = mysqli_query($mysql, $query);
 if (mysqli_num_rows($query_run) > 0) {
 foreach ($query_run as $row) {
echo"<option value='$row[subject_name]'>$row[subject_name]</option>";   
 }
}
 ?>
 <select>
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
  <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">
  <input id="fac" name="allocated_faculty" placeholder="Enter total number of questions" class="form-control input-md" type="hidden" value="<?php  echo $_SESSION['name'] ?>">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>  
  <div class="col-md-12">
  <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="wrong"></label>  
  <div class="col-md-12">
  <input id="wrong" name="wrong" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number">
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="desc"></label>  
  <div class="col-md-12">
  <textarea rows="8" cols="8" name="desc" class="form-control" placeholder="Write description here..."></textarea>  
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="button" value="Submit" class="button">
  </div>
</div>

</fieldset>
</form>
<?php }?>
</div>
</div>
<?php if(@$_GET['q']==5) {

$result = mysqli_query($mysql,"SELECT * FROM tblquiz WHERE allocated_faculty = '$_SESSION[name]'") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$sahi = $row['ryt'];
   // $time = $row['time'];
	$eid = $row['eid'];
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>&nbsp;min</td>
	<td><b><a href="removequiz.php?q=rmquiz&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b class="text-white">Remove</b></span></a></b></td></tr>';
}
$c=0;
echo '</table></div></div>';

}
?>
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