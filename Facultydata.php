<?php 
include('connect.php');

$start=$_POST['starting'];
$perpage=3;

$sql="select * from tblfaculty limit $start,$perpage";
$result=mysqli_query($mysql,$sql);

$output='';

while($data=mysqli_fetch_array($result))
{


 $output.=' <div class="col-xl-3 col-md-6 col-12 ">
 <div class="d-flex justify-content-center align-items-center">
     <div class="card" style="width: 18rem;">
         <!-- <img alt="..."
              class="card-img-top" src="./images/1.png"> -->
         <div class="card-body">
             <div class="d-flex justify-content-between">

                 <p class="small text-grey "><i class="fa-solid fa-book-open-reader"></i></p>
                 <p class="small text-grey ">'.$data['regno'].'</p>
             </div>
             <h5 class="card-title mt-3">'.$data['fac_name'].'</h5>

             <p class="card-text mt-2 mb-3">'.$data['fac_phone'].'</p>
             <!-- <a class="px-4 py-2 btn btn-dark" href="#">Read More</a> -->
         </div>
     </div>
 </div>
</div>';
}

 echo $output;


?>