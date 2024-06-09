<?php
require("./conn.php");

// Check if the 'id' parameter is set and is a valid integer
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];

  // Proceed with your normal processing for a valid 'id'
  // For example, fetch details based on the 'id' from the database
  $query = "SELECT * FROM servicesecond WHERE id = $id";
  $result = mysqli_query($conn, $query);

  if ($result && mysqli_num_rows($result) > 0) {
      // Valid 'id', continue processing
      $portfolioDetails = mysqli_fetch_assoc($result);
      // Additional code for displaying portfolio details
  } else {
      // Invalid 'id', redirect to index.php
      header("Location: index.php");
      exit; // Stop further execution of the script
  }
} else {
  // 'id' is not set or is invalid, redirect to index.php
  header("Location: index.php");
  exit; // Stop further execution of the script
}


$service_data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM servicesecond WHERE id = $_GET[id]"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Service Details - Elavate Tax Solution</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.jpg" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      <a href="index.php" class="logo me-auto"><img src="img/logo/elevate-banner.png" alt="" class="img-fluid"></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="index.php#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">About</a></li>
          <li><a class="nav-link scrollto" href="index.php#services">Services</a></li>
          <li><a class="nav-link  active scrollto" href="index.php#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="index.php#team">Team</a></li>
          <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="index.php#about">Get Started</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Service info </li>
        </ol>
        <h2>Service Details</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8 border border-3">
            <div class="portfolio-info">
              <h3>Documents required are ...</h3>
              <!-- for docs split  -->
              <?php
              // $service_data_docs = $service_data['docs'];
              $service_data_docs = $service_data['docs'];

              // Split the string into an array using the comma as a delimiter
              $docs_array = explode(",", $service_data_docs);
              ?>
              <ul>
                <li><strong>DOC 1</strong>: <?= isset($docs_array[0]) ? $docs_array[0] : '' ?></li>
                <li><strong>DOC 2</strong>: <?= isset($docs_array[1]) ? $docs_array[1] : '' ?></li>
                <li><strong>DOC 3</strong>: <?= isset($docs_array[2]) ? $docs_array[2] : '' ?></li>
                <li><strong>DOC 4</strong>: <?= isset($docs_array[3]) ? $docs_array[3] : '' ?></li>
              </ul>
              <hr>
              <h5>Additional documents might be required ! <a href="https://wa.me/+919101472116/?text=Give me more details about : <?= $service_data['title'] ?>" target="_blank" class="btn btn-info btn-sm">Let's Talk</a>
              </h5>
            </div>

          </div>
          <div class="col-lg-4">
            <h3 class="text-center">Service info</h3>
            <hr>
            <div class="portfolio-description">
              <h5><?= $service_data['title'] ?></h5>
              <p>
                <?= $service_data['description'] ?>
              </p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Elavate Tax Solution</h3>
            <p>
              Kharupetia <br>
              Darrang ,Assam <br>
              India - 784115 <br><br>
              <strong>Phone:</strong> +91 91014 72116<br>
              <strong>Email:</strong> elavatetaxsolution@gmail.com<br>
            </p>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Bank Loan Assistance</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Project Finance Preparation</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Income Tax Return Filing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Tax Audit Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">GST Registration</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Elavate Tax Solution</span></strong>. <br> All Rights Reserved
      </div>
      <div class="credits">

        Designed by <a href="https://redrosesid.in/">ABS | Redrose Sid <a href=""></a></a>
      </div>



    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>