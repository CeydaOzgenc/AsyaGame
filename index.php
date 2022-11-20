<!DOCTYPE html>
<html lang="en">
<?php include "admin_panel/database.php"; 
$sqlslider=mysqli_query($db,"select * from slider order by  Slider_Id ");
$sqlblog=mysqli_query($db,"select * from blog order by  Blog_Id ");
$sqlgalery=mysqli_query($db,"select * from galery order by  Galery_name ");
$sqlabout=mysqli_fetch_array(mysqli_query($db,"select * from about"));
$sqlcontact=mysqli_fetch_array(mysqli_query($db,"select * from contact_info"));
$sayfa=mysqli_query($db,"select * from game order by  Game_Id ");
$oyun=mysqli_query($db,"select * from game order by  Game_Id ");
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ASYA GAME</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

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
          <li><a href="#about">Hakkında</a></li>
          <li class="drop-down"><a href="">Oyunlar</a>
            <ul>
              <?php while ($sayfalar=mysqli_fetch_array($sayfa)){ ?>
                <li><a href="<?php echo 'oyunlar.php?oyun='.$sayfalar['Game_Id'] ?>"><?php echo $sayfalar['Game_name'] ?></a></li>
              <?php } ?>
            </ul>
          </li>
          <li><a href="#blog">Blog</a></li>
          <li><a href="#galeri">Galeri</a></li>
          <li><a href="#contact">İletişim</a></li>

          <li class="get-started"><a href="#about">Get Started</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Slider ======= -->
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
      
      <div class="carousel-inner" role="listbox">
        <?php $say=0; while ($slider=mysqli_fetch_array($sqlslider)){?>
            <div class="carousel-item <?php if($say==0) {echo 'active';} ?>" style="background-image: url(assets/img/slide/<?php echo $slider['Slider_img'] ; ?>);">
              <div class="carousel-container">
              </div>
            </div>
        <?php $say++; } ?>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon bx bx-left-arrow" aria-hidden="true"></span>
        <span class="sr-only">Geri</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon bx bx-right-arrow" aria-hidden="true"></span>
        <span class="sr-only">İleri</span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
            <img src="assets/img/<?php echo $sqlabout['About_img']; ?>" class="img-fluid" alt="" data-aos="zoom-in">
          </div>
          <div class="col-lg-6 pt-5 pt-lg-0">
            <h3 data-aos="fade-up"><?php echo $sqlabout['About_title']; ?></h3>
            <p data-aos="fade-up" data-aos-delay="100">
              <?php echo $sqlabout['About_text']; ?>
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="services section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Blog</h2>
          <p>Yazılarımızı takip edin..</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".Oyun">Oyun</li>
              <li data-filter=".Oyun1">Oyun1</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
          <?php while ($blog=mysqli_fetch_array($sqlblog)){?>
          <div class="col-md-6 col-lg-6 portfolio-item align-items-stretch <?php echo $blog['Blog_category'] ;?>">
            <div class="icon-box portfolio-wrap">
              <div class="icon">
                <img src="<?php echo 'assets/img/blog/'.$blog['Blog_img'] ;?>" class="img-fluid" alt="">
              </div>
              <h4 class="title"><?php echo $blog['Blog_title'] ;?></h4>
              <p><i class='fas fa-user-edit'></i> <?php echo $blog['Blog_author'] ;?> 
              <i class='fas fa-user-clock'></i> <?php echo $blog['Blog_time'] ;?></p>
              <p class="description"><?php echo $blog['Blog_text'] ;?></p>
              <h6><a href="blog.php?blog=<?php echo $blog['Blog_Id']; ?>">Daha Fazlası..</a></h6>
            </div>
          </div>
          <?php } ?>
        </div>

      </div>
    </section><!-- End Blog Section -->

    <!-- ======= Galery Section ======= -->
    <section id="galeri" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Galeri</h2>
          <p class="glid_line">Güzel galerimize göz atın</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="200">
          <?php while ($galery=mysqli_fetch_array($sqlgalery)) {?> 
          <div class="col-lg-4 col-md-6 ">
            <div class="portfolio-wrap">
              <img src="assets/img/galeri/<?php echo $galery['Galery_img']; ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <a href="assets/img/galeri/<?php echo $galery['Galery_img']; ?>" data-gall="portfolioGallery" class="venobox" title="<?php echo $galery['Galery_name']; ?>">
                  <h4><?php echo $galery['Galery_name']; ?></h4><br>
                </a>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>

      </div>
    </section><!-- End Galeri Section -->

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>İletişim</h2>
          <p>Başlamak için bizimle iletişime geçin</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Adres:</h4>
                <p><?php echo $sqlcontact['Info_location']; ?></p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p><?php echo $sqlcontact['Info_mail']; ?></p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Telefon:</h4>
                <p><?php echo $sqlcontact['Info_call']; ?></p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <form action="forms/message.php" method="post" class="php-email-form">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">İsim :</label>
                  <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Email :</label>
                  <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Konu :</label>
                <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <label for="name">Mesaj :</label>
                <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Yükleniyor</div>
                <div class="error-message"></div>
                <div class="sent-message">Mesajınız gönderildi. Teşekkür ederim!</div>
              </div>
              <div class="text-center"><button type="submit">Gönder</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

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