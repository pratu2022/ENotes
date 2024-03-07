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
      /* background-color: #DC3545; */
      background-color: #614385 !important;
      background: linear-gradient(115deg, #614385, #516395);
      border-top-right-radius: 5%;
      border-bottom-right-radius: 5%;
      padding-top: 20px;
    }

   

    #content {
      margin-left: 250px;
      /* padding: 20px; */
    }

    .nav-link {
      text-decoration: none !important;
      color: #fff !important;
      padding: 10px 20px 0px 10px;
      transition: background-color 0.3s;
    }

    .nav-link:hover {
      background-color: #fff;
      color: #614385 !important; 
    }
    .nav-link:hover .ico{
      background-color: #fff;
      color: #614385 !important; 
    }

    /* .nav-link.active {
      /* background-color: #CC0000; 
    } */

    .nav-item {
      
      margin-bottom: 4px;
    }

    /* Firefox (uncomment to work in Firefox, although other properties will not work!)  */
/** {
  scrollbar-width: thin;
  scrollbar-color: #614385 #DFE9EB;
}*/

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
  background-color: #B8C0C2;
}

*::-webkit-scrollbar-thumb {
  border-radius: 5px;
  background-color: #614385;
}

*::-webkit-scrollbar-thumb:hover {
  background-color: #B023D4;
}

*::-webkit-scrollbar-thumb:active {
  background-color: #6622AA;
}

  </style>
</head>

<body>
  <div id="sidebar" data-aos="fade-right">
  <?php 
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    ?>
    <ul class="nav flex-column">

    <li class="nav-item">
        <a class="nav-link active text-white " href="index.php"><span><img src= '../images/admin.jpg'width="50" height="50" style="border-radius:90px;margin-right:1pc"></span><?php echo $_SESSION['username'] ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active navi" href="index.php"><span><i class="fa-solid fa-house mr-4 mt-3 ico" style="color: #f1f2f3;"></i>Dashboard</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link " href="addStudent.php" >Add Student</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link " href="addStudent.php"><span><i class="fa-solid fa-graduation-cap mr-4 mt-3 ico" style="color: #f0f2f5;"></i></span>Student</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link " href="viewStudent.php">View Student</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="searchstud.php">Search Student By Registration Number</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link " href="addFaculty.php"><span><i class="fa-solid fa-chalkboard-user mr-4 mt-3 ico" style="color: #fafafa;"></i></span>Faculty</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link " href="addFaculty.php" >Add Faculty</a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link " href="Event.php"><span><i class="fa-solid fa-calendar-days mr-2 ico" style="color: #fafafa;"></i></span>Notice Board</a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link " href="searchfac.php"  >Search Faculty By Registration Number</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link text-white" href="addSubject.php"><span><i class="fa-solid fa-list mr-4 mt-3 ico" style="color: #ebeef4;"></i></span>Subject</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="viewContact.php"><span><i class="fa-solid fa-address-book mr-4 mt-3 ico" style="color: #edeff2;"></i></span>View Contactus</a>
      </li>

      <?php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
      echo "
      <li class='nav-item'>
      <a href='logout.php' class='nav-link text-white'><span><i class='fa-solid fa-arrow-right-from-bracket mr-4 mt-3 ico' style='color: #fff;'></i></span>logout</a>
    </li>";
            
    }
    ?>
    </ul>
    <?php } ?>
  </div>
  <div id="content">
    
  </div>
 
</body>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
</script>
</html>