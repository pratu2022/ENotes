<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <title>Sidebar Dashboard</title>
  <style>
    body {
      overflow-x: hidden;
    }

    #sidebar {
      height: 100vh;
      width: 250px;
      position: fixed;
      top: 0;
      left: 0;
      /* background-color: #198754; */
      background-color: #614385;
      background: linear-gradient(115deg, #614385, #516395);
      border-top-right-radius: 6%;
      border-bottom-right-radius: 6%;
      padding-top: 20px;
    }

    #content {
      margin-left: 250px;
      /* padding: 20px; */
    }

    .nav-link {
      text-decoration: none !important;
      color: #fff;
      padding: 10px 20px 0px 10px;
      transition: background-color 0.3s;
    }

    .nav-link:hover {
      color: #614385 !important;
      background-color: #fff;
    }

    .nav-link:hover .ico{
      background-color: #fff;
      color: #614385 !important; 
    }

    

    .nav-item {
      margin-bottom: 4px;
    }

    
/* Chrome, Edge and Safari */
*::-webkit-scrollbar {
  height: 10px;
  width: 10px;
}
*::-webkit-scrollbar-track {
  border-radius: 5px;
  background-color: #DFE9EB;
}

*::-webkit-scrollbar-track:hover {
  background-color: #B8C0C2;
}

*::-webkit-scrollbar-track:active {
  background-color: #b99aff;
}

*::-webkit-scrollbar-thumb {
  border-radius: 5px;
  background-color: #614385;
}

*::-webkit-scrollbar-thumb:hover {
  background-color: #b99aff;
}

*::-webkit-scrollbar-thumb:active {
  background-color: #b99aff;
}
    
.icon-button {
  background: none;
  border: none;
  cursor: pointer;
  font-size: 24px;
  color: #3498db; /* Change the color as needed */
}

/* Optional: Add some styles on hover or focus */
.icon-button:hover,
.icon-button:focus {
  outline: none;
  color: #2078c6; /* Change the hover/focus color as needed */
}

  </style>
</head>

<body>
  <div id="sidebar" data-aos="fade-right">
    <ul class="nav flex-column">

    <?php 
      //if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    ?>
    <li class="nav-item">
        <a class="nav-link active text-white " href="index.php"><span><img src= '../Admin/uploads/<?php echo $_SESSION['image'] ?>'width="50" height="50" style="border-radius:90px;margin-right:1pc"></span><?php echo $_SESSION['name'] ?></a>
      </li>

      <li class="nav-item">
        <a class="nav-link active text-white" href="index.php"><span><i class="fa-solid fa-house mr-4 mt-3 ico" style="color: #f1f2f3;"></i></span>Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="Acc.php"><span><i class="fa-solid fa-bullhorn mr-4 ico"></i></span>Announcement</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="viewNotes.php" ><span><i class="fa-solid fa-list mr-4 ico" style="color: #ebeef4;"></i></span>Courses's Notes</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link text-white" href="viewAssignment.php" ><i class="fa-regular fa-newspaper mr-4 ico"></i>Assignment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="UploadAssignment.php" ><i class="fa-regular fa-paper-plane mr-4 ico"></i>Upload Assignment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="Quiz.php" ><i class="fa-regular fa-newspaper mr-4 ico"></i>Quiz</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="viewFaculty.php"><i class="fa-solid fa-chalkboard-user mr-4 ico" style="color: #fafafa;"></i>Faculty</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="viewStudent.php"><span><i class="fa-solid fa-graduation-cap mr-4 ico" style="color: #f0f2f5;"></i></span>Classmates</a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link text-white" href="viewProfile.php"><span><i class="fa-solid fa-user mr-4 ico" style="color: #ffffff;"></i></span>View Profile</a>
      </li>
      <?php
       if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
      echo "
      <li class='nav-item'>
      <a href='../Admin/logout.php' class='nav-link text-white'><span><i class='fa-solid fa-arrow-right-from-bracket mr-4 ico' style='color: #fff;'></i></span>logout</a>
    </li>";        
    }
    ?>
    </ul>

    <?php// } ?>
  </div>
  <div id="content">
  <button type="button" class="icon-button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-solid fa-user-group" style="color:#614385"></i></button>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">Classmates Status</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  <?php
  include("../connect.php");
                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                      $UID = $_SESSION['uid'];
                     // echo $UID;
                      $name = $_SESSION['name'];
                      // $res =  mysqli_query($mysql,"SELECT * FROM tblfaculty");
                      $res =  mysqli_query($mysql,"SELECT * FROM tblstudent WHERE stud_name <> '$name'");
                      $time = time();
                     // echo $time;
                    ?>
                   <div class="container scrollable-content">
                   <table class="table">
                    <thead>
                    <tr>
                        <!-- <th>Srno</th> -->
                        <th>Name</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody id="user_grid">
                        <?php
                            $i = 0;
                            while($row = mysqli_fetch_assoc($res)){
                                $i++;
                                if($row['time'] > $time){
                                    //user online
                                    $status = 'Online';
                                    $class = 'badge-success';
                                }
                                else{
                                    // not login
                                    $status = 'Offline';
                                    $class = 'badge-danger';
                                }
                        ?>
                    <tr>
                    <!-- Student\updateStatus.php -->
                        <td><?= $row['stud_name']?></td>
                        <td><span class="badge <?= $class?>"><?= $status ?></span></td>
                    </tr>
                    <?php }} ?>
                </tbody>
                </table>
                   </div>
<script>
    

        function UpdateStatus() {
            $.ajax({
                url:'updateStatus.php',
                type:'post',
                success:() =>{

                }
            })
        }
        function getStatus() {
             $.ajax({
                url:'getUserStatus.php',
                type:'post',
                success:(res) =>{
                    $("#user_grid").html(res);
                }
            })
        }

        setInterval(() => {
            UpdateStatus();
        }, 1000);

        setInterval(() => {
            getStatus();
        }, 5000);
    </script>

<!-- <script>
  $(document).ready( function () {
    $('#myTable').DataTable();
  });
</script> -->


  </div>
</div>

  </div>
</body>
<!-- <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
</script> -->
</html>