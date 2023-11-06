<?php
    include("config/params.php");

    global $servername;
    global $username;
    global $password;
    global $database;
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

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"-->

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">clubcardio.secretariat@gmail.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>0697023659</span></i>
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

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Tableau de bord</h2>
          <ol>
            <li><a href="dashboard.php">Accueil</a></li>
            <li>Tableau de bord</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <div class="container">
          <h2>Liste des inscriptions</h2>
          <input type="text" id="search" class="form-control" placeholder="Rechercher..."><br>

          <table class="table table-bordered" id="table">
              <thead>
                  <tr>
                      <th>-</th>
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th>Numéro de téléphone</th>
                      <th>Email</th>
                      <th>Spécialité</th>
                      <th>Fonction</th>
                      <th>Adresse Professionnelle</th>
                      <th>Date d'Inscription</th>
                  </tr>
              </thead>
              <tbody>
                  <?php

                    try {
                          $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                          
                          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                          $sql = "SELECT * FROM inscriptions";
                          $stmt = $pdo->prepare($sql);
                          $stmt->execute();

                          $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                          if (count($results) > 0) {
                              $i = 1;
                              foreach ($results as $row) {
                                  echo "<tr>";
                                    echo "<td>" . $i . "</td>";
                                    echo "<td>" . $row['nom'] . "</td>";
                                    echo "<td>" . $row['prenom'] . "</td>";
                                    echo "<td>" . $row['telephone'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['specialite'] . "</td>";
                                    echo "<td>" . $row['fonction'] . "</td>";
                                    echo "<td>" . $row['adressePro'] . "</td>";
                                    echo "<td>" . $row['dateInscription'] . "</td>";
                                  echo "</tr>";
                                  $i++;
                              }
                          } else {
                              echo "<tr><td colspan='8'>Aucune inscription trouvée.</td></tr>";
                          }

                    } catch (PDOException $e) {
                        echo "Erreur : " . $e->getMessage();
                    }
                  ?>
              </tbody>
          </table>
      </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" style="padding-top: 100px;">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Club des <span>cardiologues</span> de l'ouest.</h3>
            <p>
              39 rue Balzac<br>
              Oran, Or 31013<br>
              Algérie <br><br>
              <strong>Téléphone</strong> +213 697 023 659<br>
              <strong>Email </strong>clubcardio.secretariat@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Liens utiles</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Accueil</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">À propos</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Termes de service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Équipe</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nos Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="javascript:;">Cardiologue</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="javascript:;">Endocrinologue</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="javascript:;">Medecin généraliste </a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="javascript:;">Médecine interne</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="javascript:;">Radiologue</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nos résaux sociaux</h4>
            <p>Restez en contact avec nous et suivez nos actualités sur nos réseaux sociaux</p>
            <div class="social-links mt-3">
              <a href="javascript:;" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="https://web.facebook.com/profile.php?id=100084931120289" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="javascript:;" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="javascript:;" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="javascript:;" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

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
  <script>
      $(document).ready(function(){
          $("#search").on("keyup", function() {
              var value = $(this).val().toLowerCase();
              $("#table tbody tr").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
          });
      });
  </script>
</body>

</html>