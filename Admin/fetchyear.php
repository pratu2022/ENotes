<?php
    include("../connect.php");
    $name = $_POST['name'];
    $sql = "SELECT * FROM tblsubject WHERE ac_year = $name" ;
    $res = mysqli_query($mysql,$sql);

    while($row = mysqli_fetch_assoc($res))
    {
        $data[] = $row;
    }
    echo json_encode($data);
?>