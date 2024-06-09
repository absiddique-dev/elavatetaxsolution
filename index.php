<?php
require("./conn.php");
$herodata = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM hero"));

$query = "SELECT * FROM notice WHERE status = 'active' ORDER BY id DESC LIMIT 5";
$result = mysqli_query($conn, $query);

// Array to store the fetched rows
$notices = array();

// Fetch rows and store them in the array
while ($row = mysqli_fetch_assoc($result)) {
  $notices[] = $row;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="description" content="Discover excellence in tax and financial services in Assam. Specializing in GST filing, CA services, and more. We provide more than your expectations.">
  <meta name="keywords" content="Elavate Tax Solution, business consultant in Guwahati, ETS, Arshad Ali tax expert, GST filing, tax services, financial solutions, Assam, ITR, Income Tax Return, CA firm, Tax Consultancy, Accountant, Auditor, GST Registration, GST Return filing, Udhampur Registration, FSSAI Registration">
  <meta name="author" content="Elavate Tax Solution">
  <!-- Add structured data markup here if applicable -->
  <title>Ignite Financial Brilliance with Elavate Tax Solution in Guwahati, Assam</title>

  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <!-- Favicons -->
  <!-- <link href="assets/img/logo.jpeg" rel="shortcut icon"> -->
  <!-- <link href="assets/img/logo.jpeg" rel=""> -->

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
  <link href="assets/css/custom.css" rel="stylesheet">

  <!-- tittle icon  -->
  <link rel="icon" href="assets/img/logo.jpg" type="image/x-icon">


</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- ======= Header ======= -->

  <header id="header" style="padding-bottom: 30px;" class="fixed-top">
    <div class="container d-flex align-items-center">
      <div class="d-block d-md-none">
        <div class="position-absolute fixed-bottom pt-5 text-white">
          <marquee>
            <?php
            // Iterate over the notices array and populate the HTML spans accordingly
            for ($i = 0; $i < count($notices); $i++) { ?>
              <span class="text-sm <?= $notices ? '' : 'd-none' ?>" style="font-weight: 300;padding: 0px 30px">
                <img class="px-2" src="assets\img\gif\new.gif" alt="">
                <a class="pointer-hover text-decoration-none text-white" href=""><?= $notices[$i]['noticeText'] ?></a>
              </span>
            <?php } ?>
          </marquee>
        </div>
      </div>
      <!-- <h1 class="logo me-auto m-0"><a class="h4" href="index.html"> Arshad & Associates</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php" class="logo me-auto"><img src="img/logo/elavate-banner.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="#about">Get Started</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle">

        </i>
      </nav><!-- .navbar -->


    </div>

  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1><?= $herodata['title'] ?></h1>
          <h2><?= $herodata['description'] ?></h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="https://wa.me/+919101472116/?text=Let's%20Talk" target="_blank" class="btn-get-started scrollto">Let's Talk</a>
          </div>
        </div>

        <div class="col-lg-6 order-1 order-lg-2 hero-img " data-aos="zoom-in" data-aos-delay="200">
          <!-- Show first image only in display md -->
          <div class="d-block d-md-none">
            <img src="admin/<?= $herodata['image'] ?>" class="img-fluid animated" alt="">
          </div>

          <!-- Show board box only in display lg -->
          <div class="d-none d-lg-block">
            <div class="board-box d-flex justify-content-center align-items-center position-relative pb-4">
              <img src="assets\img\notice\board.png" class="img-fluid" width="550" alt="">
              <div class="position-absolute p-2 pb-5" style="width: 330px; height: 300px; display: flex; justify-content: flex-end;">
                <marquee behavior="scroll" direction="up" scrollamount="2" style="width: 100%; height: 100%;">
                  <?php
                  // Iterate over the notices array and populate the HTML spans accordingly
                  for ($i = 0; $i < count($notices); $i++) { ?>
                    <span class="text-sm d-flex flex-col py-2" style="font-weight: 700;padding: 0px 30px">
                      <!-- <img class="px-2" src="assets\img\gif\new.gif" alt=""> -->
                      <a class="pointer-hover text-decoration-none" style="color: blue" href=""><?= $notices[$i]['noticeText'] ?></a>
                    </span>
                  <?php } ?>
                </marquee>
              </div>
            </div>
          </div>



        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              Certainly! Our tax and accounting solution agency was founded with a clear mission: to provide expert,
              personalized, and comprehensive financial services to individuals and businesses. With a team of highly
              skilled professionals, we are dedicated to helping you navigate the complex world of taxes and finances.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i>We have a team of experienced tax professionals and accountants
                who stay up-to-date with the latest tax laws and regulations to ensure you receive the best advice and
                service.</li>
              <li><i class="ri-check-double-line"></i> We understand that every client is unique, so we tailor our
                services to your specific needs and financial goals.</li>
              <li><i class="ri-check-double-line"></i>Trust is paramount in our relationship with clients. We maintain
                the highest ethical standards and prioritize transparency in all our interactions.</li>
              <li><i class="ri-check-double-line"></i>We strive to optimize your financial processes, making them more
                efficient and cost-effective, allowing you to focus on what matters most to you.</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Whether you need assistance with tax planning, accounting, or financial consulting, our agency is
              committed to delivering top-notch services that help you achieve your financial objectives. We look
              forward to working closely with you to ensure your financial success.
            </p>
            <a href="#" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <h3>There are many comapany provided these services but <strong>WHY YOU CHOOSE US</strong></h3>
              <p>
                Choosing our tax and accounting solution agency is a wise decision for several compelling reasons:
              </p>
            </div>

            <div class="accordion-list">
              <ul>
                <li>
                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span>Why
                    should I trust your agency's expertise?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Our agency is staffed with highly qualified tax professionals and accountants who stay up-to-date
                      with the latest tax laws and financial regulations. We continuously invest in professional
                      development to provide you with accurate and expert advice.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span>
                    How do you tailor your services to individual clients?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      We understand that each client has unique financial needs and goals. We start by conducting a
                      thorough assessment of your situation, allowing us to create customized solutions that align with
                      your specific objectives.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span>
                    How can I be sure you maintain high ethical standards?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Maintaining the highest ethical standards is fundamental to our agency's culture. We prioritize
                      transparency in all our dealings and adhere to a strict code of ethics to ensure your trust in our
                      services.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-4" class="collapsed"><span>04</span>
                    How do you help clients reduce costs and improve efficiency?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-4" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Our approach involves streamlining your financial processes to identify cost-saving opportunities.
                      We provide you with informed financial strategies that result in long-term savings.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-5" class="collapsed"><span>05</span>
                    How responsive is your team to client questions and concerns?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-5" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Our team is readily accessible to address your questions and concerns. We aim to provide timely
                      and comprehensive support to ensure you have peace of mind throughout our partnership.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-6" class="collapsed"><span>06</span>
                    How can I be sure you maintain high ethical standards?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-6" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Maintaining the highest ethical standards is fundamental to our agency's culture. We prioritize
                      transparency in all our dealings and adhere to a strict code of ethics to ensure your trust in our
                      services.
                    </p>
                  </div>
                </li>

              </ul>
            </div>

          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("https://cdn3d.iconscout.com/3d/premium/thumb/business-team-working-together-4759625-3975857.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
        </div>

      </div>
    </section>

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Elavate Tax Solution: Your trusted partners in taxes and finances. Our expert team offers personalized advice, backed by a successful track record, integrity, and commitment to efficiency, ensuring your financial success with unwavering support.</p>
        </div>

        <!-- ---experiments code  -->
        <div class="container">
          <div class="row">
            <?php
            $delay = 100;

            $result = mysqli_query($conn, "SELECT * FROM servicefirst");
            while ($servicefirstloop = mysqli_fetch_array($result)) {
              $descriptionWords = str_word_count($servicefirstloop['description'], 1);
              $shortDescription = implode(' ', array_slice($descriptionWords, 0, 15));
            ?>
              <div class="col-xl-3 col-md-6 d-flex flex-column align-items-center justify-content-end my-4" data-aos="zoom-in" data-aos-delay="<?= $delay ?>">
                <div class="icon-box d-flex flex-column h-100">
                  <div>
                    <h4><a href=""><?= $servicefirstloop['title'] ?></a></h4>
                    <p class="mb-2"><?= $shortDescription . (count($descriptionWords) > 15 ? ' ...' : '') ?></p>
                  </div>
                  <a href="portfolio-details.php?id=<?= $servicefirstloop['id'] ?>" class="btn btn-primary mt-auto">Learn More</a>
                </div>
              </div>
            <?php
              // Increment the delay variable for the next iteration
              $delay += 100;
            }
            ?>
          </div>
          <div class="" id="thirdRow" style="display: none;">
            <div class="row mt-5 ">
              <?php
              $delay = 100;

              $result = mysqli_query($conn, "SELECT * FROM servicesecond");
              while ($servicesecondloop = mysqli_fetch_array($result)) {
                $descriptionWords = str_word_count($servicesecondloop['description'], 1);
                $shortDescription = implode(' ', array_slice($descriptionWords, 0, 15));
              ?>
                <div class="col-xl-3 col-md-6 d-flex flex-column align-items-center justify-content-end my-4" data-aos="zoom-in" data-aos-delay="<?= $delay ?>">
                  <div class="icon-box d-flex flex-column h-100">
                    <div>
                      <h4><a href=""><?= $servicesecondloop['title'] ?></a></h4>
                      <p class="mb-2"><?= $shortDescription . (count($descriptionWords) > 15 ? ' ...' : '') ?></p>
                    </div>
                    <a href="portfolio-details2.php?id=<?= $servicesecondloop['id'] ?>" class="btn btn-primary mt-auto">Learn More</a>
                  </div>
                </div>
              <?php
                // Increment the delay variable for the next iteration
                $delay += 100;
              }
              ?>
            </div>
          </div>
        </div>
        <button id="showButton" class="btn btn-info mt-3 ms-3">Show More</button>
      </div>
      <!-- for more service button  -->
      <script>
        document.getElementById("showButton").addEventListener("click", function() {
          var thirdRow = document.getElementById("thirdRow");
          var button = document.getElementById("showButton");

          if (thirdRow.style.display === "none") {
            thirdRow.style.display = "block";
            button.innerText = "Hide";
          } else {
            thirdRow.style.display = "none";
            button.innerText = "Show More";
          }
        });
      </script>

      <!-- ---experiments code  -->


      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Explore Our Portfolio</h2>
          <p>Explore our portfolio showcasing our expertise and dedication in delivering successful outcomes for tax, financial, and accounting needs across diverse industries.</p>
        </div>

        <section id="facts" class="facts">
          <div class="container">

            <div class="row no-gutters">

              <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up">
                <div class="count-box">
                  <i class="bi bi-emoji-smile"></i>
                  <span data-purecounter-start="0" data-purecounter-end="112" data-purecounter-duration="2" class="purecounter"></span>
                  <p><strong>Happy Clients</strong> <br>We earn in last 3 years </p>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="count-box">
                  <i class="bi bi-journal-richtext"></i>
                  <span data-purecounter-start="0" data-purecounter-end="326" data-purecounter-duration="2" class="purecounter"></span>
                  <p><strong>Tax Files</strong> delivered in last 3 Years across all over Assam</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="count-box">
                  <i class="bi bi-check2-circle"></i>
                  <span data-purecounter-start="0" data-purecounter-end="3" data-purecounter-duration="3" class="purecounter"></span>
                  <p><strong>Year of Experience, </strong>Provide Financial Service all over Assam</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="count-box">
                  <i class="bi bi-people"></i>
                  <span data-purecounter-start="0" data-purecounter-end="16" data-purecounter-duration="3" class="purecounter"></span>
                  <p><strong>Total District, </strong>All over Assam We provided service last year</p>
                </div>
              </div>

            </div>

          </div>
        </section>

        <!-- Internal Purecounter JavaScript -->
        <script>
          function purecounter(element, start, end, duration) {
            var range = end - start;
            var current = start;
            var increment = end > start ? 1 : -1;
            var stepTime = Math.abs(Math.floor(duration / range));
            var timer = setInterval(function() {
              current += increment;
              element.textContent = current;
              if (current == end) {
                clearInterval(timer);
              }
            }, stepTime);
          }

          document.addEventListener("DOMContentLoaded", function() {
            var counters = document.querySelectorAll('.purecounter');
            counters.forEach(function(counter) {
              var start = parseInt(counter.getAttribute('data-purecounter-start'));
              var end = parseInt(counter.getAttribute('data-purecounter-end'));
              var duration = parseInt(counter.getAttribute('data-purecounter-duration'));
              purecounter(counter, start, end, duration);
            });
          });
        </script>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>Crafted by seasoned experts in tax, finance, and accounting, our team is dedicated to delivering tailored
            solutions. Meet the faces behind our expertise, driven by a passion for excellence and a collaborative
            approach, all aimed at your financial success.</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic">
                <img src="assets/img/team/founder.jpg" class="img-fluid rounded" alt="Arshad Ali founder ETS" style="width: 100%; height: 100%; object-fit: cover;">
              </div>
              <div class="member-info">
                <h4>Arshad Ali,</h4>
                <span>Proprietor</span>
                <p>Pursuing CA from ICAI and CMA from ICMAI, brings extensive financial expertise to our services from the last 3 years</p>
                <div class="social">
                  <a href="https://twitter.com/" target="_blank"><i class="ri-twitter-fill"></i></a>
                  <a href="https://www.facebook.com/profile.php?id=100011450621521" target="_blank"><i class="ri-facebook-fill"></i></a>
                  <a href="https://www.instagram.com/a_rs_h_ad" target="_blank"><i class="ri-instagram-fill"></i></a>
                  <a href="https://www.linkedin.com/" target="_blank"><i class="ri-linkedin-box-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
              <div class="pic">
                <img src="assets/img/team/suman-ets.jpg" class="img-fluid " alt="SUMAN SHARMA GST EXPERT ETS" style="width: 100%; height: 100%; object-fit: cover;">
              </div>
              <div class="member-info">
                <h4>Suman Sharma</h4>
                <span>GST Expert</span>
                <p>Experienced GST expert adept at navigating and optimizing Goods and Services Tax compliance for businesses.</p>
                <div class="social">
                  <a href="https://twitter.com/"><i class="ri-twitter-fill"></i></a>
                  <a href="https://www.facebook.com"><i class="ri-facebook-fill"></i></a>
                  <a href="https://www.instagram.com"><i class="ri-instagram-fill"></i></a>
                  <a href="https://www.linkedin.com/"><i class="ri-linkedin-box-fill"></i></a>
                </div>
              </div>
            </div>
          </div>


          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
              <div class="pic"><img src="assets/img/team/user1.png" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Dil Rehana Begum</h4>
                <span>Income Tax Expert</span>
                <p>Navigating tax complexities with precision, ensuring financial clarity and compliance for individuals and businesses.</p>
                <div class="social">
                  <a href="https://twitter.com/"><i class="ri-twitter-fill"></i></a>
                  <a href="https://www.facebook.com"><i class="ri-facebook-fill"></i></a>
                  <a href="https://www.instagram.com"><i class="ri-instagram-fill"></i></a>
                  <a href="https://www.linkedin.com/"> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
              <div class="pic"><img src="assets/img/team/user1.png" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Ashique Ahmed</h4>
                <span>Accountant</span>
                <p>Detail-oriented accountant skilled in financial analysis and record management, dedicated to ensuring
                  precision and accuracy in financial reporting.</p>
                <div class="social">
                  <a href="https://twitter.com/"><i class="ri-twitter-fill"></i></a>
                  <a href="https://www.facebook.com"><i class="ri-facebook-fill"></i></a>
                  <a href="https://www.instagram.com"><i class="ri-instagram-fill"></i></a>
                  <a href="https://www.linkedin.com/"> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Pricing Section ======= -->
    <!-- ------------------------------  -->
    <!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questions (FAQ)</h2>
          <p>
            Explore our FAQ for answers on tax and accounting solutions; for personalized assistance, reach out to us directly.</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">1. What services do you offer? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse" data-bs-parent=".faq-list">
                <p>
                  We offer a wide range of services, including tax planning, preparation, financial consulting, business
                  accounting, and more. Explore our services page for a comprehensive list.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">2. How can I schedule a consultation? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  To schedule a consultation, simply visit our 'Contact' page and fill out the inquiry form, or you can
                  reach us via phone or email. We'll respond promptly to set up a convenient time for you.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">What makes your team qualified to handle my financial needs? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Our team comprises experienced tax professionals and accountants who stay up-to-date with the latest
                  regulations. We bring years of expertise to help you achieve your financial goals.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Can you assist with both personal and business financial matters?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Yes, we provide services for both individuals and businesses. Our team is equipped to address a wide
                  range of financial needs.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="500">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">How do I know which services are right for me? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                  How do I know which services are right for me?We offer personalized consultations to assess your
                  unique needs and recommend tailored solutions. Contact us, and we'll guide you in selecting the
                  services that best suit your situation.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>
            We're here for your financial needs - just a message away for prompt and personalized assistance.</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Hospital Road,Sendighat, Kharupetia, Opposite of Anowa Agency, Pin-784115, Assam - IND</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>elavatetaxsolution@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+91 91014 72116</p>
              </div>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0">
            <form method="POST" class="php-email-form">
              <div class="">
                <div class="row">
                  <div class="form-group col-md-6  mt-3">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                  </div>
                  <div class="form-group col-md-6  mt-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email *optional">
                  </div>
                  <div class="form-group col-md-6 mt-3">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Service *optional">
                  </div>
                  <div class="form-group col-md-6 mt-3">
                    <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone no" required>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="4" placeholder="Explain Your requirements *optional"></textarea>
                </div>
              </div>
              <button type="submit" name="sendmgs" class="form-control btn btn-primary mt-2">Send Message</button>
            </form>

            <!-- // php for form submission in dba_close -->
            <?php
            if (isset($_POST['sendmgs'])) {
              $name = htmlentities($_POST['name']);
              $email = htmlentities($_POST['email']);
              $subject = htmlentities($_POST['subject']);
              $phone = htmlentities($_POST['phone']);
              $message = htmlentities($_POST['message']);

              // Validate phone number
              if (!preg_match('/^\d{10}$/', $phone)) {
            ?>
                <script>
                  Swal.fire({
                    title: 'Error!',
                    text: 'Please enter a valid 10-digit phone number',
                    icon: 'error',
                    confirmButtonText: 'Okay'
                  });
                </script>
                <?php
                // You may choose to exit here or handle the error in another way
              } else {
                // Phone number is valid, proceed with other validations

                $existquery = "SELECT * FROM contacts WHERE phone = '$phone'";
                $counts = mysqli_num_rows(mysqli_query($conn, $existquery));

                if ($counts == 0) {
                  $q = "INSERT INTO contacts SET
                name = '$name',
                email = '$email',
                subject = '$subject',
                phone = '$phone',
                message = '$message'
            ";

                  $run = mysqli_query($conn, $q);

                  if ($run) {
                ?>
                    <script>
                      Swal.fire({
                        title: 'Success!',
                        text: 'Your message has been sent to the Team Head',
                        icon: 'success',
                        confirmButtonText: 'Okay'
                      }).then((result) => {
                        if (result.isConfirmed) {
                          location.replace('index.php');
                        }
                      });
                    </script>
                  <?php
                  }
                } else {
                  ?>
                  <script>
                    Swal.fire({
                      title: 'error',
                      text: 'Your message has been already sent to the Team Head',
                      icon: 'error',
                      confirmButtonText: 'Okay'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        location.replace('index.php');
                      }
                    });
                  </script>
            <?php


                }
              }
            }
            ?>


          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d892.4167116455588!2d92.14784266604192!3d26.530837172684404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375b23744dabbd5b%3A0x4e07387f5c0dc13c!2sHospital%20Road!5e0!3m2!1sen!2sin!4v1694229208871!5m2!1sen!2sin" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
      </div>
    </div>

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
            <p>Only believe our details by visiting our official websites</p>
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

        Designed by <a href="https://redrosesid.in/" target="_blank">ABS | Redrose Sid</a>
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
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- check js  -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>