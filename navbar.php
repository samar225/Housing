<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home - Student Housing System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- ////////////// -->


<!-- ///////////// -->

  <!-- Favicons -->
  <link href="logo/png/logo.png" rel="icon">
  <link href="logo/png/logo-no-background.png" rel="logo">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <script href="assets/js/main.js"></script>
</head>

<!-- ======= Header ======= -->
<header class="header d-flex align-items-center justify-content-between sticky-top" id="header">


  <a class="logo " href="index.php">
    <img src="logo/png/logo-no-background.png">
  </a>
  <?php
  $db = new mysqli('localhost', 'root', '', 'uni');
  if (isset($_SESSION['email'])) {
    $u_email = $_SESSION['email'];
    $sql1 = "SELECT * from `user` where `email` ='$u_email'";
    $result1 = mysqli_query($db, $sql1);

    if (mysqli_num_rows($result1) > 0) {
      while ($rowss = mysqli_fetch_assoc($result1)) {
        $role = $rowss['role'];


        if ($rowss['role'] == 'owner') {

          ?>
          <!-- Nav Menu -->
          <nav id="navmenu" class="navmenu">
            <ul>
              <li><a href="index.php" class="active">Home</a></li>
              <li><a href="about.php">About</a></li>

              <li><a href="contact.php">Contact</a></li>
              <li><a href="owner-index.php">Dashboard</a></li>
            </ul>
          </nav>
          <?php
        } else if ($rowss['role'] == 'admin') {
          ?>
            <!-- Nav Menu -->
            <nav id="navmenu" class="navmenu">
              <ul>
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="about.php">About</a></li>

                <li><a href="contact.php">Contact</a></li>
                <li><a href="admin-index.php">Dashboard</a></li>

              </ul>
            </nav>
        <?php } else if ($rowss['role'] == 'student') {

          ?>
              <!-- Nav Menu -->
              <nav id="navmenu" class="navmenu">
                <ul>
                  <li><a href="index.php" class="active">Home</a></li>
                  <li><a href="about.php">About</a></li>

                  <li><a href="contact.php">Contact</a></li>
                  <li><a href="profile.php">My Profile</a></li>
                </ul>
              </nav>
        <?php }





      }
    }
  } else { ?>
    <!-- Nav Menu -->
    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="about.php">About</a></li>

        <li><a href="contact.php">Contact</a></li>


      </ul>
    </nav>
    <?php

  }
  ?>



  <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>


  <?php

  if (isset($_SESSION["email"]) && !empty($_SESSION['email'])) {
    ?>
    <a class="btn-secondary" href="logout.php"><span class="glyphicon glyphicon-user"></span>
      Logout</a>

    <?php

  } else { ?>
    <div class="a">
      <a class="btn-secondary " href="register.php"><span class="glyphicon glyphicon-user"></span>
        Register</a>

      <a class="btn-primary" href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
    </div>

  <?php } ?>
  <!-- </nav>End Nav Menu -->

</header>


</html>