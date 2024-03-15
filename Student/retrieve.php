<?php
    include("../connect.php");

    $q = "select * from tblfaculty";
    $result = mysqli_query($mysql,$q);

    while($row = mysqli_fetch_assoc($result))
    { 
        $data[] = $row;
    }
    echo json_encode($data);

?>