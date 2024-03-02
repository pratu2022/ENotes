<?php
//session_start();
?>
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

  </style>
</head>

<body>
  <div id="sidebar">
    <ul class="nav flex-column">

    <?php 
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    ?>
      <li class="nav-item">
        <a class="nav-link active text-white " href="index.php"><span><img src= '../Admin/uploads/<?php echo $_SESSION['image'] ?>'width="50" height="50" style="border-radius:90px;margin-right:1pc"></span><?php echo $_SESSION['name'] ?></a>
      </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link active text-white" href="index.php"><span><i class="fa-solid fa-house mr-4 mt-3 ico" style="color: #f1f2f3;"></i></span>Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="Acc.php"><span><i class="fa-solid fa-bullhorn mr-4 ico"></i></span>Accouncement</a>
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
    }~
    ?>
    </ul>
   
  </div>
  <div id="content">
   
  </div>
</body>

</html>