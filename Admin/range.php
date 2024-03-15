<?php
include("../connect.php");
if(isset($_POST["From"], $_POST["to"]))
{
    $result = '';
    $query = "SELECT * FROM tblfaculty WHERE register_date BETWEEN '".$_POST["From"]."' AND '".$_POST["to"]."'";
    $sql = mysqli_query($mysql, $query);
    $result .='
    <table class="table table-striped" id="myTable">
    <thead>
    <tr>
    <th>Faculty Registration No</th>
    <th>Faculty Name</th>
    <th>Faculty Email</th>
    <th>Faculty Address</th>
    <th>Faculty Image</th>
    <th>Faculty Phone</th>
    </tr>
</thead>';
   
    
    if(mysqli_num_rows($sql) > 0)
    {
        while($row = mysqli_fetch_array($sql))
        {
            $result .='
            <tr>
            <td>'.$row["regno"].'</td>
            <td>'.$row["fac_name"].'</td>
            <td>'.$row["fac_email"].'</td>
            <td>'.$row["fac_address"].'</td>
            <td><img src="uploadf/'.$row["fac_image"].'" alt="" width ="50" height="50"></td>
            <td>'.$row["fac_phone"].'</td>
            </tr>';
        }
    }
    else
    {
        $result .='
        <tr>
        <td colspan="5">No Such Faculties</td>
        </tr>';
    }
    $result .='</table>';
    echo $result;
}
?>