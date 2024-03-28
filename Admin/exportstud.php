<?php
include_once("../connect.php");
$sql_query = "SELECT * FROM tblstudent WHERE register_date BETWEEN '".$_POST["From"]."' AND '".$_POST["to"]."'";
//$sql_query = "SELECT * FROM tblfaculty";
$resultset = mysqli_query($mysql, $sql_query) or die("database error:". mysqli_error($mysql));
$developer_records = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
	$developer_records[] = $rows;
}	
if(isset($_POST["ranges"])) {	
	$filename = "StudentReport".date('Ymd') . ".xls";			
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=\"$filename\"");	
	$show_coloumn = false;
	if(!empty($developer_records)) {
	  foreach($developer_records as $record) {
		if(!$show_coloumn) {
		  // display field/column names in first row
		  echo implode("\t", array_keys($record)) . "\n";
		  $show_coloumn = true;
		}
		echo implode("\t", array_values($record)) . "\n";
	  }
	}
	exit;  
}
?>