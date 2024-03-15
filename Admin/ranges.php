<?php
include("../connect.php");
if(isset($_POST["From"], $_POST["to"]))
{
    $result = '';
    $query = "SELECT * FROM tblstudent WHERE register_date BETWEEN '".$_POST["From"]."' AND '".$_POST["to"]."'";
    $sql = mysqli_query($mysql, $query);
    $result .='
    <table class="table table-striped" id="myTable">
    <thead>
    <tr>
    <th>Student Registration No</th>
    <th>Student Name</th>
    <th>Student Email</th>
    <th>Student Address</th>
    <th>Student Image</th>
    <th>Student Phone</th>
    </tr>
</thead>';
   
    
    if(mysqli_num_rows($sql) > 0)
    {
        while($row = mysqli_fetch_array($sql))
        {
            $result .='
            <tr>
            <td>'.$row["regno"].'</td>
            <td>'.$row["stud_name"].'</td>
            <td>'.$row["stud_email"].'</td>
            <td>'.$row["stud_address"].'</td>
            <td><img src="uploads/'.$row["stud_image"].'" alt="" width ="50" height="50"></td>
            <td>'.$row["stud_phone"].'</td>
            </tr>';
        }
    }
    else
    {
        $result .='
        <tr>
        <td colspan="5">No Such Student</td>
        </tr>';
    }
    $result .='</table>';
    echo $result;
}
?>