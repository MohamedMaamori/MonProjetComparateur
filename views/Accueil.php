<!DOCTYPE html>
<!--
accueil.php
http://localhost/MonProjetPerso/views/Accueil.php
-->
<html lang="fr">

<head>

  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  <!--<script src="../js/script.js" defer></script>-->
  <title>accueil</title>
  <link rel="stylesheet" href="../css/style.css" />
</head>

<body>


  <header>
    <?php
    // include './partials/header.php';
    ?>

    <nav class="navbar navbar-expand-sm" style="background-color: #f1f1f1;">
      <div class="container-fluid">
        <a class="navbar-brand" href="../views/Accueil.php"><img src="../images/logo-station.png" width="60" height="60" /><strong>&#10149;COM</strong>PARIO
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="" id="navbarNav">
          <ul class="navbar-nav" href="../views/Infos.php">
            <li class="nav-item dropdown">
              <a class="nav-link active dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-current="page" href="#"><strong>Actualités &
                  Infos</strong></a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a href="#d-flex" class="dropdown-item">Actualités</a>
                </li>
                <li><a href="#d-flex" class="dropdown-item">Infos</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="row">
          <div class="col-xs-8 col-sm-8 text right">
            <a class="nav-link active" href="../views/Inscription.php">Inscription</a>
          </div>
          <div class="col-xs-8 col-sm-8 text right">
            <a class="nav-link active" href="../views/Authentification.php">Authentification</a>
          </div>
        </div>
      </div>

    </nav>
  </header>
  <?php
  // include './partials/header.php';
  ?>



  <nav>
    <?php
   // include './partials/nav.php';
    ?>
  </nav>


  <hr />
  <div class="d-sm-flex">
    <img src="../images/carburant5.png" width="100%" height="500px" />
  </div>
  <div id="form">

    <form>
  <!--<input type="text" id="champ" placeholder="ville?">
  <button id="btn">Recherche></button>
  <div id="output"></div>-->
      <label for="ville"></label>
      <select name="ville" id="ville">
      </select>
      <input type="submit" value="Valider" id="btValider" />
      <label id="lblMessage"></label>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
      let xhr = $.get(
          "../ressources/json/ville.json",
         "json"
      ) /// $.get


      xhr.done(data => {
        console.log(data)
        for (let i = 0; i < data.length; i++) {
          let option = $("<option>")
          option.val(data[i].CodePostal)
          option.html(data[i].Ville)
          $("#ville").append(option)
        }
      })

      xhr.fail((xhr, statut, erreur) => {
        console.log("Erreur AJAX : " + xhr.status + "-" + xhr.statusText + " : " + statut)
        console.log(xhr)
        console.log(statut)
        console.log(erreur)
        $("#lblMessage").html(xhr.status + "-" + xhr.statusText)
      })

      $("#btValider").on("click", () => {
        let cp = $("#ville").val()
        let xhr = $.get(
            "../ressources/json/ville.json",
            "json"
        ) /// $.get

        xhr.done(data => {
          console.log(data)
          for (let i = 0; i < data.length; i++) {
            if (cp === data[i].CodePostal) {
              $("#lblMessage").html(data[i].Ville + " [" + data[i].CodePostal + "] : " + data[i].Station + " station")
            }
          }
        })

        xhr.fail((xhr, statut, erreur) => {
          console.log("Erreur AJAX : " + xhr.status + "-" + xhr.statusText + " : " + statut)
          console.log(xhr)
          console.log(statut)
          console.log(erreur)
          $("#lblMessage").html(xhr.status + "-" + xhr.statusText)
        })
      })

    </script>
  </div>

  <hr />
  <h2>Infos</h2>

  <!--<footer class="mt-auto" style="color: #f1f1f1;">
    <div class="footer-copyright text-center px-3 py-3" style="background-color: black;">
      &#169;2023 Copyright : All right reserved
    </div>
  </footer>-->
  <!-- Footer -->
  <footer class="text-center text-lg-start bg-light text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">


      <!-- Right -->
      <div>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>Company name
            </h6>
            <p>
              Here you can use rows and columns to organize your footer content. Lorem ipsum
              dolor sit amet, consectetur adipisicing elit.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Products
            </h6>
            <p>
              <a href="#!" class="text-reset">Angular</a>
            </p>
            <p>
              <a href="#!" class="text-reset">React</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Vue</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Laravel</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Useful links
            </h6>
            <p>
              <a href="#!" class="text-reset">Pricing</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Settings</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Orders</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Help</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              info@example.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
            <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2023 Copyright:
      <a class="text-reset fw-bold" href="">Compario</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
  </script>
</body>

</html>