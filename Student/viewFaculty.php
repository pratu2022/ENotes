<?php
session_start();
require("sidebar.php");
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
        
</style>

<body>

    <div id="content">
        <div class="container ">
        <h1 class="display-6">Faculty</h1>
        <hr class="mt-3">
            <div class="row">
                <div class="col-md-12">
                    <!-- <div class="card mt-3">
                        <div class="card-header">
                        </div>
                        <div class="card-body">

                        </div>
                        </div>
                    </div> -->
                    <?php
                            include("../connect.php");
                            $query = "SELECT * FROM tblfaculty";
                            $query_run = mysqli_query($mysql, $query);
                            ?>

                            <div class="row gap-3">
                                <?php
                                if (mysqli_num_rows($query_run) > 0) {

                                    foreach ($query_run as $row) {
                                        ?>
                                        
                                            <div class="card" style="width: 35rem;">
                                               <div class="row">
                                                <div class="col-sm-3">
                                                <img src="<?php echo "../Admin/uploadf/" . $row['fac_image'] ?>" class="card-img-top"
                                                    alt="..." width="100" height="100">
                                                </div>
                                                <div class="col-sm-9">
                                                    <h5 class="display-5 mt-3"><?php echo $row['fac_name'] ?></h5>
                                                </div>
                                               </div>
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        <?php echo $row['fac_name'] ?>
                                                    </h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">
                                                        <?php echo $row['regno'] ?>
                                                    </h6>
                                                    <p class="card-text">
                                                    Email:<?php echo $row['fac_email'] ?>
                                                    <br>
                                                    Gender:<?php echo $row['fac_gender'] ?>
                                                    <br>
                                                    Address:
                                                    <?php echo $row['fac_address'] ?>
                                                    </p>

                                                    <div class="card-footer">
                                                   
                                                </div>
                                            </div>
                                        </div>

                                        <?php

                                    }

                                } else {
                                    ?>

                                    <tr>
                                        <td>No Record Found!</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>