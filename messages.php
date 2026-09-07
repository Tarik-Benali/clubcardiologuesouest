<?php
    include("config/auth.php");

    include("config/params.php");

    global $servername;
    global $username;
    global $password;
    global $database;

    $messages = "";

    try {
        $pdo = new PDO("mysql:host=".$servername.";dbname=".$database."", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT id, name, email, subject, message, attached_file, created_at FROM messages ORDER BY created_at DESC");
        $stmt->execute();
        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
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

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style type="text/css">
    .icon-lg {
        font-size: 24px; /* Vous pouvez ajuster la taille selon vos besoins */
    }
  </style>


</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:abboudjamel22@gmail.com">abboudjamel22@gmail.com</a></i>
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
          <li><a class="nav-link scrollto" href="dashboard.php">Dashboard</a></li>
          <li><a class="nav-link scrollto" href="logout.php">Déconnexion</a></li>
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
          <h2>Messages</h2>
          <ol>
            <li><a href="dashboard.php">Accueil</a></li>
            <li>Messages</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <div class="container table-responsive">
          <h2>Messages des visiteurs</h2>
          <input type="text" id="filter" class="form-control" placeholder="Rechercher..."><br>

          <table class="table table-bordered" id="message-table" border="1">
              <thead>
                  <tr>
                      <th>Nom</th>
                      <th>Email</th>
                      <th>Objet</th>
                      <th>Message</th>
                      <th>File</th>
                      <th>Date</th>
                  </tr>
              </thead>
              <tbody>
                  <?php 
                    foreach($messages as $message){
                      echo'<tr>
                              <td>'. $message['name'].  '</td>
                              <td>'. $message['email']. '</td>
                              <td>'. $message['subject'].'</td>
                              <td>'. $message['message'].'</td>
                              <td class="text-center">';

                                if (!empty($message['attached_file'])) {

                                    $file_extension = pathinfo($message['attached_file'], PATHINFO_EXTENSION);

                                    $icon_class = 'bi bi-file-earmark';
                                    if ($file_extension === 'pdf') {
                                        $icon_class .= '-pdf-fill';
                                    } elseif ($file_extension === 'doc' || $file_extension === 'docx') {
                                        $icon_class .= '-word-fill';
                                    } elseif ($file_extension === 'xls' || $file_extension === 'xlsx') {
                                        $icon_class .= '-excel-fill';
                                    } elseif ($file_extension === 'ppt' || $file_extension === 'pptx') {
                                        $icon_class .= '-ppt-fill';
                                    }

                                    echo '<a href="'. $message["attached_file"].'" download>
                                              <i class="'. $icon_class .' icon-lg"></i>
                                          </a>';
                                }
                                else{ echo "-"; } 
                              
                              echo '</td>
                              <td>'.$message['created_at'].'</td>';
                      echo '</tr>';
                    } ?>
              </tbody>
          </table>
        </div>
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
  <script>
    document.getElementById("filter").addEventListener("input", function() {
        var filterText = this.value.toLowerCase();
        var rows = document.querySelectorAll("#message-table tbody tr");

        for (var row of rows) {
            var displayRow = false;

            // Parcourez toutes les cellules de la ligne
            var cells = row.querySelectorAll("td");
            for (var cell of cells) {
                var cellText = cell.textContent.toLowerCase();
                if (cellText.includes(filterText)) {
                    displayRow = true;
                    break; 
                }
            }

            if (displayRow) {
                row.style.display = "table-row";
            } else {
                row.style.display = "none";
            }
        }
    });
  </script>

</body>

</html>