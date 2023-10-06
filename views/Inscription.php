<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  <script src="../js/Inscription.js"></script>
  <link rel="stylesheet" href="../css/style1.css" />
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-sm" style="background-color: #f1f1f1;">
      <div class="container-fluid">
        <a class="navbar-brand" href="../views/Accueil.php"><img src="../images/logo-station.png" width="60" height="60" /><strong>&#10149;COM</strong>PARIO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link active dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-current="page" href="#"><strong>Actualités &
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

    <?php
    //include './partials/header.php';
    ?>
  </header>
  <nav>
    <?php
    //include './partials/nav.php';
    ?>
  </nav>
  <?php
 // $message = "";
  //$affected = 0;
  //echo "";
  ?>
  <div class="main-content">
  <?php
  if (isset($message)) {
    echo $message;
  }
  ?>
  <section>
    <main>
      <div class="container">
        <div class="row">
          <div class="col">
            <center>
              <h3>Inscription</h3>
            </center>
          </div>
        </div>
        <div class="row">
          <form action="../controllers/InscriptionCTRL.php" method="post" id="formInscription" >
            <form action="" method="post">
            <fieldset>
              <legend>
                <div class="mb-2 row">
                  <div class="offset-sm-3 col-sm-4">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="radio" role="switch" id="flexSwitchCheckDefault1" name="civilite">
                      <label class="form-check-label" for="flexSwitchCheckDefault1">Monsieur</label>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="radio" role="switch" id="flexSwitchCheckDefault2" name="civilite">
                      <label class="form-check-label" for="flexSwitchCheckDefault2">Madame</label>
                    </div>
                  </div>
                </div>
                <div class="mb-2 row">
                  <label for="inputNom" class="col-sm-3"></label>
                  <div class="col-sm-6">
                    <input type="text" name="nom" class="form-control" id="inputNom" placeholder="Nom " />
                  </div>
                </div>
                <div class="mb-2 row">
                  <label for="inputPrenom" class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-6">
                    <input type="text" name="prenom" class="form-control" id="inputPrenom" placeholder="Prénom " />
                  </div>
                </div>
                <div class="mb-2 row">
                  <label for="inputPseudo" class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-6">
                    <input type="text" name="pseudo" class="form-control" id="inputPseudo" placeholder="Pseudo " />
                  </div>
                </div>
                <div class="mb-2 row">
                  <label for="inputVille" class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-6">
                    <input type="text" name="ville" class="form-control" id="inputVille" placeholder="Ville " />
                  </div>
                </div>
                <div class="mb-2 row">
                  <label for="inputMail" class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-6">
                    <input type="email" name="mail" class="form-control" id="inputMail" placeholder="E-mail " />
                  </div>
                </div>
                <div class="mb-2 row">
                  <label for="inputMdp" class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-6">
                    <input type="password" name="mdp" class="form-control" id="inputMdp" placeholder="Mot de passe" />
                  </div>
                </div>
                <div class="mb-2 row">
                  <label for="inputMdp2" class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-6">
                    <input type="password" name="mdp2" class="form-control" id="inputMdp2" placeholder="Confirmer mot de passe " />
                  </div>
                </div>
                <div class="mb-2 row">
                  <label for="Checkbox" class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-4">
                    <input type="Checkbox" id="Checkbox" name="Checkbox"  />
                    <label id="lblCheckbox">Mot de passe visible</label>
                  </div>
                </div>
                <div class="mb-2 row">
                  <label for="select" class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-6">
                    <input class="btn btn-primary" value="Valider" name="btValidez" id="btValidez" type="submit"></input>
                    <label id="lblMessage"></label>
                  </div>
                </div>
              </legend>
            </fieldset>

          </form>

    </main>
  </section>
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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
  </script>
</body>
</html>
