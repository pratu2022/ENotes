<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
{
include_once("sidebar.php");
include_once("../connect.php");
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
<h1 class="display-6">Quiz</h1>
<hr class = "my-3"/>
<div class="row">
<?php 
$result = mysqli_query($mysql,"SELECT * FROM tblquiz") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr>
<thead>
<td><b>Topic</b></td>
<td><b>Total question</b></td>
<td><b>Plus Marks</b></td>
<td><b>Minus Marking</b></td>
<td><b></b></td>
</thead>
</tr>';
$c = 1;
?>

<tbody>
<?php while($row= mysqli_fetch_array($result)) { 
    $title = $row['title'];
    $total = $row['total'];
    $ryt = $row['ryt'];
    $wrg = $row['wrg'];
    $eid = $row['eid'];

    $qu=mysqli_query($mysql,"SELECT score FROM history WHERE eid='$eid' AND name='$_SESSION[name]'")or die('Error98');
    $rowcount = mysqli_num_rows($qu);
    if($rowcount == 0){
  ?>
    <tr>
    <td><?php echo $row["title"]; ?></td>
    <td><?php echo $row["total"]; ?></td>
    <td><?php echo $row["ryt"]; ?></td>
    <td><?php echo $row["wrg"]; ?></td>
    <td><a href="start.php?q=quiz&step=2&eid=<?php echo $row["eid"];?>&n=1&t=<?php echo $row["total"];?>" class="pull-right btn sub1" style="margin:0px;background:#99cc32"><i class="fa-solid fa-play"></i>&nbsp;<span class="title1"><b>Start</b></span></a></b></td>
    </tr>
<?php }
else{
  ?>
    <tr>
    <td><?php echo $row["title"]; ?></td>
    <td><?php echo $row["total"]; ?></td>
    <td><?php echo $row["ryt"]; ?></td>
    <td><?php echo $row["wrg"]; ?></td>
    <td><a href="restart.php?q=quizre&step=25&eid=<?php echo $row["eid"];?>&n=1&t=<?php echo $row["total"];?>" class="pull-right btn sub1" style="margin:0px;background:red"><i class="fa-solid fa-arrow-rotate-right text-white"></i>&nbsp;<span class="title1"><b class="text-white">Restart</b></span></a></b></td>
    </tr>
<?php }
  // echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	// <td><b><a href="update.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Restart</b></span></a></b></td></tr>';
}


?>
</tbody>
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