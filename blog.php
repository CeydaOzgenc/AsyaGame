<!DOCTYPE html>
<html lang="en">
<?php include "admin_panel/database.php"; 
$sayfa=mysqli_query($db,"select * from game order by Game_Id "); 
$blog=$_GET['blog'];
$blogsql=mysqli_fetch_array(mysqli_query($db,"select * from blog where Blog_Id=".$blog)); 
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ASYA GAME | BLOG</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Ninestars - v2.3.1
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid d-flex">

      <div class="logo mr-auto">
        <h1 class="text-light">
          <a href="index.html">
            <img src="assets/img/logo.png" alt="" class="img-fluid"/>
          </a>
        </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Anasayfa</a></li>
          <li><a href="index.php#about">Hakkında</a></li>
          <li class="drop-down"><a href="">Oyunlar</a>
            <ul>
              <?php while ($sayfalar=mysqli_fetch_array($sayfa)){ ?>
                <li><a href="<?php echo 'oyunlar.php?oyun='.$sayfalar['Game_Id'] ?>"><?php echo $sayfalar['Game_name'] ?></a></li>
              <?php } ?>
            </ul>
          </li>
          <li><a href="index.php#blog">Blog</a></li>
          <li><a href="index.php#galeri">Galeri</a></li>
          <li><a href="index.php#contact">İletişim</a></li>

          <li class="get-started"><a href="index.php#about">Get Started</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog Detay</h2>
          <ol>
            <li><a href="index.php">Anasayfa</a></li>
            <li><a href="index.php#blog">Blog</a></li>
            <li>Blog Detay</li>
          </ol>
        </div>

      </div>
    </section><!-- Breadcrumbs Section -->

    <!-- ======= Portfolio Details Section ======= -->
    <section class="portfolio-details">
      <div class="container">

        <div class="portfolio-details-container">

          <div class="owl-carousel portfolio-details-carousel">
            <img src="assets/img/blog/<?php echo $blogsql['Blog_img']; ?>" class="img-fluid" alt="">
          </div>

          <div class="portfolio-info">
            <h3>Blog Bilgisi</h3>
            <ul>
              <li><strong>Kategori</strong>: <?php echo $blogsql['Blog_category']; ?></li>
              <li><strong>Yazan</strong>: <?php echo $blogsql['Blog_author']; ?></li>
              <li><strong>Tarih</strong>: <?php echo $blogsql['Blog_time']; ?></li>
            </ul>
          </div>

        </div>

        <div class="portfolio-description">
          <h2><?php echo $blogsql['Blog_title']; ?></h2>
          <p>
            <?php echo $blogsql['Blog_text']; ?>
          </p>
        </div>
      </div>
    </section><!-- End Portfolio Details Section -->
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact" data-aos="fade-up" data-aos-delay="100">
            <h3>AsyaGame</h3>
            <p>
              İstanbul İstinye Park <br>
              <strong>Email:</strong> asyagame@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="200">
            <h4>Site Haritası</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Anasayfa</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Hakkında</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">İletişim</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="300">
            <h4>Oyunlar</h4>
            <ul>
              <?php while ($sayfalar=mysqli_fetch_array($oyun)){ ?>
                <li><i class="bx bx-chevron-right"></i> <a href="<?php echo 'oyunlar.php?oyun='.$sayfalar['Game_Id'] ?>"><?php echo $sayfalar['Game_name'] ?></a></li>
              <?php } ?>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="400">
            <h4>Sosyal Medya</h4>
            <p>Bizi takip edin..</p>
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

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright Tüm hakları<strong><span>Asya Game</span></strong> saklıdır.
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->


  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>