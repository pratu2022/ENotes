<?php
include("../connect.php");
if(isset($_POST["From"], $_POST["to"]))
{
    $result = '';
    $query = "SELECT * FROM tbluploadassign WHERE date BETWEEN '".$_POST["From"]."' AND '".$_POST["to"]."'";
    $sql = mysqli_query($mysql, $query);
    $filename = "phpzag_data_export_".date('Ymd') . ".xls";			
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=\"$filename\"");	
    $result .='
    <table class="table table-striped" id="myTable">
    <thead>
    <tr>
    <th>Student</th>
    <th>Uploaded On</th>
    <th>Subject</th>
    <th>Status</th>
    
    </tr>
</thead>';
   
    
    if(mysqli_num_rows($sql) > 0)
    {
        while($row = mysqli_fetch_array($sql))
        {
            $result .='
            <tr>
            <td>'.$row["uploadedby_stud"].'</td>
            <td>'.$row["uploadedon"].'</td>
            <td>'.$row["subject"].'</td>
            <td>'.$row["status"].'</td>
            </tr>';
        }
    }
    else
    {
        $result .='
        <tr>
        <td colspan="5">No Such Assignments</td>
        </tr>';
    }
    $result .='</table>';
    echo $result;
}
?>