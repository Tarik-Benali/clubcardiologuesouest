<?php 
  include("config/loggedin.php"); 

  echo $response = "";

  if (isset($_GET['response']) && $_GET['response'] === 'incorrect') {

      $response = '<div style="color: red;">Nom d\'utilisateur ou mot de passe incorrect.</div><br>';
  }

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Club des cardiologues de l'ouest</title>
  <meta content="Club des cardiologues de l'ouest" name="description">
  <meta content="Club des cardiologues de l'ouest|Cardiologues|Cardiologues Oran|Cardiologues Algérie|Congrés cardiologues" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/CCO/logo cco.png" rel="icon">
  <link href="assets/img/CCO/logo cco.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


  <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"-->

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">abboudjamel22@gmail.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>0770504382</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://web.facebook.com/profile.php?id=100084931120289" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="dashboard.php"><img src="assets/img/CCO/logo cco.png" alt="Club des cardiologues de l'ouest" style="margin-top: -10px;">&nbsp;Club Cardio Ouest<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/CCO/logo cco.png" alt=""></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.html" target="_blank">Allez au site web</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main" data-aos="fade-up">

    <section id="contact" class="contact">
      <div class="container col-md-4" data-aos="fade-up">
        <h2>Connexion</h2>
          <form action="check_login.php" method="post" role="form" class="php-email-form">
              <?php echo $response; ?> 
              <div class="row">
                <div class="col form-group">
                  <label for="username">Nom d'utilisateur :</label><br>
                </div>
                <div class="col form-group">
                  <input type="text" id="username" name="username" required>
                </div>
              </div>
              <div class="row">
                <div class="col form-group">
                  <label for="password">Mot de passe :</label><br>
                </div>
                <div class="col form-group">
                  <input type="password" id="password" name="password" required>
                </div>
              </div>
              <div class="text-center"><button type="submit">Se connecter</button></div>
          </form>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" style="padding-top: 100px;">
    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Club des cardiologues de l'ouest</span></strong>, Tous droits réservés..
      </div>
      <div class="credits">
        <!--Designed by <a href="https://www.linkedin.com/in/tarikbenaliamar/">Tarik Benali amar</a-->
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>