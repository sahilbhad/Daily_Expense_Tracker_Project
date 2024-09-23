<?php
  include('connction.php');
  
session_start();
 include("connction.php");
 if(isset($_POST["submit"]))
 {
    $name=$_POST["uname"];
    $password=$_POST["pass"];

    $result=mysqli_query($con,"SELECT * FROM  u_register WHERE username='$name' AND password ='$password'");
    $insert=mysqli_fetch_array($result);

     if($insert)
     {
        
        $_SESSION['name_id']=$insert['id'];
        $result2=mysqli_query($con,"SELECT * FROM  add_income WHERE u_id = '$insert[id]'");
        if($row = mysqli_fetch_array($result2))
        {
          $_SESSION['income'] ='income';
        }
        else
        {
          $_SESSION['income'] = 'hello';
        }
        $_SESSION["name_user"]=$name;
        echo "<script> alert (' login successfully');</script>";
        echo "<script>window.location.href='dashboard.php'</script>"; 
      
        
    }
     else
         {
            echo "<script> alert ('wrong id or password');</script>";
    
        }

}
?>
 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Daily Expense Tracker</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
   
   
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href=" " class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span>DETS</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Daliy Expense Tracker</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Why Tracking business expense Is Way Imporatant Than Other Things?</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="register.php" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Rigster</span>
                <i class="bi bi-arrow-right"></i>
                
                
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          
        <div class="wrapper">
    <h2>Sing Up</h2>
    <form method="POST">
      <div class="input-box">
        <input type="text" placeholder="Enter your name" name="uname"required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Create password" name="pass" required>
      </div>
      <div class="input-box button">
        <input type="Submit" value="Login Now" name="submit">
      </div>
      <div class="text">
        <h3>Creat  New Account ? <a href=" register.php">Register now</a></h3>
      </div>
    </form>
  </div>


        </div>
      </div>
    </div>
    </head>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>