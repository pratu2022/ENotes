<?php
    include("../connect.php");
    $name = $_POST['name'];
    $sql = "SELECT * FROM tblfaculty WHERE LOWER(tblfaculty.`fac_name`) LIKE '%$name%' " ;
    $res = mysqli_query($mysql,$sql);

    while($row = mysqli_fetch_assoc($res))
    {
        $data[] = $row;
    }
    echo json_encode($data);
?>