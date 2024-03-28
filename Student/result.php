<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>   
  <style>

    /* #content {
        margin-left: 250px;
        padding-left: 5pc; 
    } */

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
.card{
    box-shadow: rgba(255, 255, 255, 0.2) 0px 60px 40px -7px;}


  </style>
  <body class="bg-dark">
    <div id="content">
    <div class="container">
  <?php
session_start();
$name = $_SESSION['name'];
include_once("../connect.php");
if(@$_GET['q']== 'result' && @$_GET['eid']) 
{
$eid=@$_GET['eid'];
$q=mysqli_query($mysql,"SELECT * FROM history WHERE eid='$eid' AND name='$name'LIMIT 1" )or die('Error157');
echo  '<div class="panel mt-5">
<div class="row">
<div class="col-md-6 offset-md-3 mt-5 p-5">
  <div class="card">
    <div class="card-body">
      <center><h1 class="card-title">Result</h1></center>';

while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$w=$row['wrg'];
$r=$row['ryt'];
$qa=$row['level'];
echo '<div class="lead">
<center>
      <h4 class="text-primary mt-5">Total Questions&nbsp;'.$qa.'</h4>
      <h4 class="text-success">Right Answer&nbsp;'.$r.' </h4>
	  <h4 class="text-danger">Wrong Answer&nbsp;'.$w.'</h4>
	  <h4 class="text-info">Score&nbsp;'.$s.'</div></h4>
      </center>
      </div>
    </div>
  </div>
  </div>';
     
            
         
}
// $q=mysqli_query($mysql,"SELECT * FROM rank WHERE  name='$name' " )or die('Error157');
// while($row=mysqli_fetch_array($q) )
// {
// $s=$row['score'];
// echo '<tr style="color:#990000"><td>Overall Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
// }
// echo '</table></div>';
 }
?>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>