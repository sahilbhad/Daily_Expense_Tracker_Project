<?php
  include('connction.php');
  if(isset($_POST["submit"]))
{
    $name=$_POST["uname"];
    $email=$_POST["email"];
    $password=$_POST["pass"];
     $confropassword=$_POST["cpass"];
     if($password == $confropassword)
     {
    
     $query ="INSERT INTO u_register VALUES(null,'$name','$email','$password')";
     $insert=mysqli_query($con,$query);
     if($insert)
    {
        //echo"record insert";
        echo "<script> alert (' Register has been  successfully');</script>";
        echo "<script>window.location.href='index.php'</script>";
       
    }
    else
    {
        echo "<script> alert ('Rigster failed');</script>";
    }
}
    else
    {
        echo "<script> alert ('Password mismatch');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Daily Expense Tracker</title>
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

      <a href="" class="logo d-flex align-items-center">
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
              <a href="index.php" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>login</span>
                <i class="bi bi-arrow-right"></i>
                
                
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          
        <div class="wrapper">
    <h2>Sing In</h2>
    <form method="POST">
      <div class="input-box">
        <input type="text" placeholder="Enter your name" name="uname"required>
      </div>
      <div class="input-box">
        <input type="email" placeholder="Enter your email" name="email" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Create password" name="pass" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Confirm password" name="cpass" required>
      </div>
      <div class="policy">
         
      </div>
      <div class="input-box button">
        <input type="Submit" value="Register Now" name="submit">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="index.php">Login now</a></h3>
      </div>
    </form>
  </div>

        

        </div>
      </div>
    </div>
    </head>
  


  

 
  <!-- ======= Footer ======= -->
  
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