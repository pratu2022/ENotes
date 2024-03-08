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
        <script src="myajaxstud.js"></script>

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
        <div class="row">
            <div class="col-sm-6">
            <h1 class="display-6">Classmates</h1>
            </div>
            <div class="col-sm-6">
            <form class="ms-auto mt-1 w-75" role="search">
            <input class="form-control " type="search" placeholder="Search" aria-label="Search" id="mytxt" onkeyup="myfunc1()">
            </form>
         </form>
            </div>
        </div>
        <hr class="mt-3">
        <div class="row">
                <div class="col-md-12">
                <div id="tbody" class="row gap-3"></div>
        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>