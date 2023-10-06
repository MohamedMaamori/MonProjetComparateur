<!DOCTYPE html>
<!--
Authentification.php
c:/xampp/htdocs/MonProjetPerso/views/Authentification.php
http://localhost/MonProjetPerso/views/Authentification.php
-->
<html>

<head>
  <meta charset="UTF-8">
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="../css/style1.css" />
  <script src="../js/Authentification.js"></script>

</head>

<body>
<header>
  <nav class="navbar navbar-expand-sm" style="background-color: #f1f1f1;">
    <div class="container-fluid">
      <a class="navbar-brand" href="../views/Accueil.php"><img src="../images/logo-station.png" width="60"
                                                               height="60" /><strong>&#10149;COM</strong>PARIO</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
               aria-current="page" href="#"><strong>Actualités &
                Infos</strong></a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a href="#" class="dropdown-item">Actualités</a>
              </li>
              <li><a href="#" class="dropdown-item">Infos</a>
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
  <body>
 <div class="main-content">
  <?php
  if (!isSet($mail)) {
    $mail = "";
  }
  if (!isSet($mdp)) {
    $mdp = "";
  }
  ?>
  <hr>
  <section>
    <div class="container">
      <div class="row">
        <div class="col">
          <center>
            <h3>Authentification</h3>
          </center>
        </div>
      </div>
    </div>
    <div class="row">
      <form method="post" action="../controllers/AuthentificationCTRL.php" id="formLogin" class="auth-form">
        <fieldset>
          <div class="mb-2 row">
            <label for="pseudo"  class="col-sm-3 col-form-label"></label>
            <div class="col-sm-6">
              <input type="text" name="inputPseudo" class="form-control" id="pseudo" placeholder="Identifiant ?" value="simo" />
            </div>
          </div>
          <div class="mb-2 row">
            <label for="mdp"  class="col-sm-3 col-form-label"></label>
            <div class="col-sm-6">
              <input type="password" name="inputMdp" class="form-control" id="mdp" placeholder="Mot de passe ?"  value="mdp123"/>
            </div>
          </div>
          <div class="mb-2 row">
            <label for="Checkbox" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-6">
              <input type="Checkbox" id="Checkbox" name="Checkbox"  />
              <label id="lblCheckbox">Mot de passe visible</label>
            </div>
          </div>
          <div class="mb-2 row">
            <label for="select" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-6">
              <input class="btn btn-primary" value="Valider" name="btValider" id="btValider" type="button"/>
            </div>
          </div>
          <div id="lblMessage"></div>
          <center>
            <a href="../controllers/MotDePasseOublieCTRL.php" id="motDePasseOublie">Mot de passe oublié ?</a>
          </center>
          <div class="mb-2 row">
            <label for="checkbox" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-6">
              <input type="checkbox" id="checkbox" name="SeSouvenirDeMoi" value="ON" />
              <label>Se Souvenir De Moi</label>
            </div>
          </div>
    </div>
    </fieldset>
    </form>

<script>
  function getData(pseudo, mdp) {
    // const URL = "http://m2icdi.alwaysdata.net/PourFrontJS/php/PaysSelectFromMySQL.php"

    const URL = `http://localhost/MonProjetComparateur/PourFrontJS/PHP/authentification.php?pseudo=${pseudo}&mdp=${mdp}`;

    fetch(URL)
        .then((response) => {
          console.log("RESPONSE");
          console.log(response);

          return response.json();
        })
        .then(
            (result) => {
              // Tableau ordinal d’objets JSON
              console.log("RESULT");
              console.log(result);
              let code = result.message;
              let message = "";
              switch (code) {
                case 0:
                  message = "OK, vous êtes connectés";
                  window.location.href = "Promotion.php";
                  break;
                case 1:
                  message = "KO, vous n'êtes pas connectés";
                  break;
                case -1:
                  message = "Contactez votre administrateur";
                  break;
              }
              document.getElementById("lblMessage").innerHTML = message;
              console.log ("message");
            },
            (error) => {
              console.log("ERROR");
              console.log(error);
              //document.getElementById("lblMessage").innerHTML = error;
            }
        );
  } /// getData

  /*
  MAIN
  */
  document.getElementById("btValider").addEventListener("click", () => {
    let pseudo = document.getElementById("pseudo").value;
    let mdp = document.getElementById("mdp").value;
    getData(pseudo, mdp);


  });
</script>


  <?php
    if (isset($message)) {
      echo "" . $message;
    }
    ?>
    </p>

  </section>
  <hr>


    <?php
    // include '../partials/footer.php';
    ?>
 </div>

  <footer class="bg-dark text-center text-white">

    <div class="container p-4 pb-0">

      <section class="">
        <form action="">

          <div class="row d-flex justify-content-center">

            <div class="col-auto">
              <p class="pt-2">
                <strong>Inscrivez-vous à notre newsletter</strong>
              </p>
            </div>
            <div class="col-md-5 col-12">
              <div class="form-outline form-white mb-4">
                <input type="email" id="form5Example29" class="form-control" />
                <label class="form-label" for="form5Example29">Addresse e-mail</label>
              </div>
            </div>
            <div class="col-auto">

              <button type="submit" class="btn btn-primary mb-4">
                Subscribe
              </button>
            </div>
          </div>
        </form>
      </section>
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2023 Copyright : All right reserved
      <a class="text-white" href="">  Compario</a>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
          integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
          integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
  </script>

  </body>
</html>