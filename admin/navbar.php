<!DOCTYPE html>
<html lang="en">
<head>
<title>Home - Student Housing System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

  <!-- <meta content="" name="description">
  <meta content="" name="keywords"> -->

  <!-- Favicons -->
  <link href="../logo/png/logo.png" rel="icon">
  <link href="../logo/png/logo-no-background.png" rel="logo">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- <nav class="navbar navbar-expand-sm navbar-light justify-content-between" style="background-color: #e3f2fd;">
  <div class="container-fluid">
  <a class="navbar-header" href="index.php">
    <img src="../images/logo.png" alt="logo" style="height:50px;">
  </a> -->
  
  <!-- Links -->
  <!-- <ul class="nav navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="owner-index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About Us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Contact Us</a>
    </li>
  </ul>
  <ul class="nav navbar-nav navbar-right">
    <?php 
if(isset($_SESSION["email"]) && !empty($_SESSION['email'])){
  echo '<li><a href="../logout.php">Logout</a></li>';
}

else {?>
      <li><a href="../how-to-register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
      <li><a href="../how-to-login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    <?php } ?>
    </ul>
  </div>
</nav> -->


<!-- ======= Header ======= -->
<header class="header d-flex align-items-center justify-content-between sticky-top" id="header">
 

    <a class="logo d-flex align-items-center me-auto me-xl-0" href="../index.php">
      <img src="logo/png/logo-no-background.png">
    </a>

    <!-- Nav Menu -->
    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="../index.php" class="active">Home</a></li>
        <li><a href="../index.html#about">About</a></li>

        <li><a href="../index.html#contact">Contact</a></li>
      </ul>

      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

    </nav>
    <?php


if(isset($_SESSION["email"]) && !empty($_SESSION['email'])){
  echo '<li><a href="../logout.php">Logout</a></li>';
}

else {?>
      <!-- <div class="b"> -->
        <a class="btn-getstarted" href="../how-to-register.php"><span class="glyphicon glyphicon-user"></span>
          Register</a>

        <a class="btn-getstarted" href="../how-to-login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>

      <!-- </div> -->

    <?php } ?>
    <!-- </nav>End Nav Menu -->

</header>



</body>
</html>
