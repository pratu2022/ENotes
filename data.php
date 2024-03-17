<?php 

include('connect.php');

$limit=4;
$start=($_POST['page']-1)*$limit;

$sql="select * from tblsubject limit $start,$limit";
$result=mysqli_query($mysql,$sql);

$output='';

while($data=mysqli_fetch_array($result))
{
// $output.='<div class="col-xl-7">
//   <div class="card">
//     <div class="card-body">
//       <h4 class="card-title">'.$data['subject_code'].'</h4>
//       <p class="card-text">'.$data['subject_code'].'</p>
   
//     </div>
//   </div>
//   <br>
  
//   </div>';
$output.='<div class="col-xl-3 col-md-6 col-12">';
$output.='<div class="d-flex justify-content-center align-items-center">';
$output.='<div class="card" style="width: 18rem;>';
$output.='<div class="card-body">';
$output.='<div class="d-flex justify-content-between p-3">';
$output.='<p class="small text-grey "><i class="fa-solid fa-book-open-reader"></i></p>';
$output.='<p class="small text-grey">'.$data['ac_year'].'</p>';
$output.='</div>';
$output.='<h5 class="card-title" style="margin-left:1pc;">'.$data['subject_name'].'</h5>';
$output.='<p class="card-text mb-4" style="margin-left:1pc;">';
$output.=''.$data['allocated_faculty'].'</p>';
$output.='</div>';
$output.='</div>';
$output.='</div>';
$output.='</div>';
 
}

echo $output;

?>