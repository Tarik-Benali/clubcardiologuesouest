<?php
    include("config/auth.php");

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
          <li><a class="nav-link scrollto" href="messages.php">Messages</a></li>
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
        <div class="container table-responsive">
          <h2>Liste des inscriptions</h2>
          <input type="text" id="search" class="form-control" placeholder="Rechercher..."><br>

          <!--begin::Actions-->
          <div class="card-toolbar">
            <div class="d-flex flex-stack flex-wrap gap-4">
              <div class="ms-auto d-flex position-relative my-1">
                <button type="button" class="btn btn-icon btn-outline-primary mr-2" onclick="printTable()"
                  title="Imprimer la table">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"></path>
                    <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1"></path>
                  </svg>
                </button>
              </div>

              <button type="button" class="btn btn-icon btn-outline-success" onclick="exportTableToXLSX()" title="Exporter la table en XLSX">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-xlsx" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M14 4.5V11h-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM7.86 14.841a1.13 1.13 0 0 0 .401.823q.195.162.479.252.284.091.665.091.507 0 .858-.158.355-.158.54-.44a1.17 1.17 0 0 0 .187-.656q0-.336-.135-.56a1 1 0 0 0-.375-.357 2 2 0 0 0-.565-.21l-.621-.144a1 1 0 0 1-.405-.176.37.37 0 0 1-.143-.299q0-.234.184-.384.188-.152.513-.152.214 0 .37.068a.6.6 0 0 1 .245.181.56.56 0 0 1 .12.258h.75a1.1 1.1 0 0 0-.199-.566 1.2 1.2 0 0 0-.5-.41 1.8 1.8 0 0 0-.78-.152q-.44 0-.777.15-.336.149-.527.421-.19.273-.19.639 0 .302.123.524t.351.367q.229.143.54.213l.618.144q.31.073.462.193a.39.39 0 0 1 .153.326.5.5 0 0 1-.085.29.56.56 0 0 1-.255.193q-.168.07-.413.07-.176 0-.32-.04a.8.8 0 0 1-.249-.115.58.58 0 0 1-.255-.384zm-3.726-2.909h.893l-1.274 2.007 1.254 1.992h-.908l-.85-1.415h-.035l-.853 1.415H1.5l1.24-2.016-1.228-1.983h.931l.832 1.438h.036zm1.923 3.325h1.697v.674H5.266v-3.999h.791zm7.636-3.325h.893l-1.274 2.007 1.254 1.992h-.908l-.85-1.415h-.035l-.853 1.415h-.861l1.24-2.016-1.228-1.983h.931l.832 1.438h.036z"/>
                </svg>
              </button>                             
            </div>
          </div>        
          <!--end::Actions-->

          <table class="table table-bordered" id="table">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th>Numéro de téléphone</th>
                      <th>Email</th>
                      <th>Spécialité</th>
                      <th>Fonction</th>
                      <th>Adresse Professionnelle</th>
                      <th>Inscription</th>
                      <th>Status</th>
                      <th>Options</th>
                  </tr>
              </thead>
              <tbody>
                  <?php

                    try {
                          $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                          
                          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                          $sql = "SELECT * FROM `inscriptions` WHERE YEAR(dateInscription)= ". date('Y') ." AND inTrash=0";
                          $stmt = $pdo->prepare($sql);
                          $stmt->execute();

                          $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                          if (count($results) > 0) {
                              $i = 1;
                              foreach ($results as $row) {
                                  $status = $row['status'];
                                  if ($status === "Non confirme" || $status === "Non confirmé") {
                                    $status = "Non confirmé";
                                    $span = '<span class="badge bg-secondary">Non confirmé</span>';
                                  }else{
                                    $span = '<span class="badge bg-success">'.$status.'</span>';
                                  }

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
                                    echo "<td>" . $span . "</td>";
                                    echo '<td>
                                            <div class="row">
                                              <div class="col-md-5" style="margin-left:-5px;margin-right:2px;">
                                                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#editModal_'.$row['id'].'">
                                                  <i class="bi bi-gear"></i>
                                                </button>
                                              </div>
                                              <div class="col-md-5">
                                                <button type="button" class="btn btn-light" onclick="deleteInscrip('.$row['id'].')">
                                                  <i class="bi bi-trash"></i>
                                                </button>
                                              </div>
                                            </div>  
                                          </td>';
                                  echo "</tr>";
                                  echo '<div class="modal" id="editModal_'.$row['id'].'" tabindex="-1" role="dialog">
                                          <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modification de l\'inscription</h5>
                                                        <div class="btn btn-sm btn-icon btn-active-color-primary" id="x-modal" data-dismiss="modal">
                                                          <span class="svg-icon svg-icon-1">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                              <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                              <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                            </svg>
                                                          </span>
                                                        </div>
                                                    </div>
                                                    <form id="editForm" action="update_inscription.php" method="post">
                                                      <input type="hidden" name="inscription_id" value="'.$row['id'].'" required>;
                                                      <div class="modal-body">
                                                          <div class="row" style="margin-bottom: 30px; margin-top: 50px;">
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label for="nom"><b>Nom</b></label>
                                                                      <input name="nom" type="text" class="form-control" value="'.$row['nom'].'" required>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                    <label for="prenom"><b>Prénom</b></label>
                                                                    <input name="prenom" type="text" class="form-control" value="'.$row['prenom'].'" required>
                                                                  </div>
                                                              </div>
                                                          </div>

                                                          <div class="row" style="margin-bottom: 30px;">
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                    <label for="telephone"><b>Numéro de téléphone</b></label>
                                                                    <input name="telephone" type="tel" class="form-control" value="'.$row['telephone'].'" required>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label for="email"><b>Email</b></label>
                                                                      <input name="email" type="email" class="form-control" value="'.$row['email'].'" required>
                                                                  </div>
                                                              </div>
                                                          </div>

                                                          <div class="row" style="margin-bottom: 30px;">
                                                              <div class="col-md-6">
                                                                  <label for="specialite"><b>Spécialité</b></label>
                                                                  <select name="specialite" class="form-control select2" style="width: 100%;">
                                                                      <option value="'.$row['specialite'].'" selected>'.$row['specialite'].'</option>
                                                                      <option value="Endocrinologue">Endocrinologue</option>
                                                                      <option value="Medecin généraliste">Médecin généraliste</option>
                                                                      <option value="Médecine interne">Médecine interne</option>
                                                                      <option value="Radiologue">Radiologue</option>
                                                                      <option value="Cardiologue">Cardiologue</option>
                                                                  </select>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label for="fonction"><b>Fonction</b></label>
                                                                      <select name="fonction" class="form-control select2" style="width: 100%;">
                                                                          <option value="'.$row['fonction'].'" selected>'.$row['fonction'].'</option>
                                                                          <option value="Hospitalier">Hospitalier</option>
                                                                          <option value="Libéral">Libéral</option>
                                                                      </select>
                                                                  </div>
                                                              </div>
                                                          </div>

                                                          <div class="row" style="margin-bottom: 30px;">
                                                              <div class="col-md-6">
                                                                  <label for="adressePro"><b>Adresse Professionnelle</b></label>
                                                                  <input type="text" name="adressePro" class="form-control" value="'.$row['adressePro'].'">
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label for="fonction"><b>Status</b></label>
                                                                      <select name="status" class="form-control select2" style="width: 100%;" required>
                                                                          <option value="'.$status.'" selected>Présence '.$status.'</option>
                                                                          <option value="Confirmé">Confirmé</option>
                                                                          <option value="Non confirmé">Non confirmé</option>
                                                                      </select>  
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                                      </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>';
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
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

  <script>
    function deleteInscrip(id){

      if (confirm('Voulez-vous vraiment supprimer cet inscription ?')) {
          let deleter = '<?php echo $_SESSION['username']; ?>';
          window.location.href = 'update_inscription.php?id=' + id + '&deleter=' + deleter;
      }
    }
  </script>

  <script type="text/javascript">
    function printTable() {
      var divToPrint = document.getElementById('table');
      var tableCopy = divToPrint.cloneNode(true);

      var rows = tableCopy.querySelectorAll('tr');
      rows.forEach(function (row) {
          row.deleteCell(row.cells.length - 1);
      });

      var newWin = window.open('');
      newWin.document.write('<html><head><title>Impression de la table</title>');
      newWin.document.write('<style>table {width: 100%; border-collapse: collapse;} th, td {border: 1px solid black; padding: 8px; text-align: left;} th {font-weight: bold;}</style>');
      newWin.document.write('</head><body>');
      newWin.document.write(tableCopy.outerHTML);
      newWin.document.write('</body></html>');
      newWin.document.close();
      newWin.print();
    }

    function exportTableToXLSX() {
      var table = document.getElementById('table');
      var tableCopy = table.cloneNode(true);

      var rows = tableCopy.querySelectorAll('tr');
      rows.forEach(function (row) {
          row.deleteCell(row.cells.length - 1);
      });
      
      var workbook = XLSX.utils.book_new();
      var worksheet = XLSX.utils.table_to_sheet(tableCopy);

      XLSX.utils.book_append_sheet(workbook, worksheet, 'Données');

      var now = new Date();
      var dateTime = now.getFullYear() + '-' + 
               String(now.getMonth() + 1).padStart(2, '0') + '-' + 
               String(now.getDate()).padStart(2, '0') + '_' + 
               String(now.getHours()).padStart(2, '0') + '-' + 
               String(now.getMinutes()).padStart(2, '0') + '-' + 
               String(now.getSeconds()).padStart(2, '0');

      var filename = 'Préinscription congrès_' + dateTime + '.xlsx';

      XLSX.writeFile(workbook, filename);
    }
  </script>

</body>

</html>