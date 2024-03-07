<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
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
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    ?>
    <li class="nav-item">
        <a class="nav-link active text-white " href="index.php"><span><img src= '../Admin/uploadf/<?php echo $_SESSION['image'] ?>'width="50" height="50" style="border-radius:90px;margin-right:1pc"></span><?php echo $_SESSION['name'] ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active text-white" href="index.php"><span><i class="fa-solid fa-house mr-4 mt-3 ico" style="color: #f1f2f3;"></i></span>Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="addnotes.php"><span><i class="fa-solid fa-book-open-reader mr-4 ico" style="color: #f9fafb;"></i></span>Notes Manage</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link text-white" href="viewNotes.php"><span><i class="fa-solid fa-note-sticky mr-2 ico" style="color: #ffffff;"></i></span>View Notes</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link text-white" href="addAssignment.php"><span><i class="fa-solid fa-paste mr-4 ico" style="color: #f9fafb;"></i></span>Assignement Manage</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="viewSAssign.php"><span><i class="fa-solid fa-paperclip mr-4 ico" style="color: #ffffff;"></i></span>Student's Assignment</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link text-white" href="viewStudF.php"><i class="fa-solid fa-magnifying-glass mr-4 ico"></i><span></span>Student Report</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="Acc.php"><span><i class="fa-solid fa-bullhorn mr-4 ico"></i></span>Announcement</a>
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
    <?php } ?>
  </div>
  <div id="content">
  <button type="button" class="icon-button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-solid fa-user-group" style="color:#614385"></i></button>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">Faculty Status</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  <?php
  include("../connect.php");
                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                     // $UID = $_SESSION['uid'];
                      $name = $_SESSION['name'];
                      // $res =  mysqli_query($mysql,"SELECT * FROM tblfaculty");
                      $res =  mysqli_query($mysql,"SELECT * FROM tblfaculty WHERE fac_name <> '$name'");
                      $time = time();
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
                        
                        <td><?= $row['fac_name']?></td>
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
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
</script>
</html>