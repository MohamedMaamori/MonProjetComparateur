<!DOCTYPE html>
<!--
accueil.php
http://localhost/MonProjetPerso/views/Accueil.php
-->
<html lang="fr">

<head>

  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  <!--<script src="../js/script.js" defer></script>-->
  <title>accueil</title>
  <link rel="stylesheet" href="../css/style1.css" />


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
        <div class="search-container">
          <form action="Accueil.php" method="get">
            <label for="zipcode"></label>
            <input type="text" id="zipcode" name="zipcode" placeholder="ville,code postale" required>
            <button type="submit"><i class="fas fa-search"></i> Rechercher</button>
          </form>
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
  <div class="main-content">
  <img src="../images/carburant5.png" width="100%" height="500px">
    <?php
    // Déclarer la variable zipcode et initialiser à vide
    $zipcode = '';

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      // Récupérer la valeur du champ d'entrée 'zipcode' s'il est présent dans le formulaire
      if (isset($_POST['zipcode'])) {
        $zipcode = $_POST['zipcode'];
      }

      // Vérifie si le paramètre 'zipcode' est vide ou non
      if (!empty($zipcode)) {
        $api_url = 'https://public.opendatasoft.com/api/records/1.0/search/';
        $dataset = 'prix_des_carburants_j_7';

        // Paramètres de la requête à l'API
        $query_params = [
            'dataset' => $dataset,
            'q' => $zipcode,
            'facet' => [
                'cp', 'pop', 'city', 'automate_24_24',
                'fuel', 'shortage', 'update', 'services', 'brand'
            ],
        ];

        // Construit la chaîne de requête en utilisant les paramètres
        $query_string = http_build_query($query_params);

        // Construit l'URL complète de la requête à l'API
        $request_url = $api_url . '?' . $query_string;

        // Envoie une requête à l'URL et récupère la réponse
        $response = file_get_contents($request_url);

        // Décode la réponse JSON en tableau associatif
        $data = json_decode($response, true);
      }
    }
    ?>



    <div class="results-container">
      <?php
      // Vérifie si des enregistrements ont été obtenus de l'API
      if (isset($data['records'])) {
        echo "<table>";
        echo "<tr><th></th><th>GASOIL</th><th>E10</th><th>GPL</th><th>Adresse</th></tr>";

        // Parcourt les enregistrements obtenus
        foreach ($data['records'] as $record) {
          $fields = $record['fields'];
          // Récupère les valeurs des champs nécessaires
          $brand = isset($fields['brand']) ? $fields['brand'] : "";
          $price_gazole = isset($fields['price_gazole']) ? $fields['price_gazole'] : "";
          $price_e10 = isset($fields['price_e10']) ? $fields['price_e10'] : "";
          $price_e85 = isset($fields['price_e85']) ? $fields['price_e85'] : "";
          $address = isset($fields['address']) ? $fields['address'] : "";

          // Vérifie si au moins un des prix est disponible pour affichage
          if ($price_e10 || $price_gazole) {
            // Affiche une ligne avec les informations dans le tableau
            echo "<tr>";
            echo "<td class='brand-cell'>$brand</td>";
            echo "<td class='price-cell'>$price_gazole</td>";
            echo "<td class='price-cell'>$price_e10</td>";
            echo "<td class='price-cell'>$price_e85</td>";
            echo "<td>$address</td>";
            echo "</tr>";
          }
        }
        echo "</table>";
      }
      ?>
    </div>
    </body>
    </html>

</div>
  <hr />
  <div class="content-container">
    <div class="image-container">
      <img class="image" src="../images/décomposition.webp" alt="Image">
    </div>
    <div class="survey-container">
      <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSeAipK76AEaDSrjGZnoeyJLFXXfbwsHbSF4pjqgLjlvZGm_Ng/viewform?embedded=true" width="100%" height="600" frameborder="0" marginheight="0" marginwidth="0">Chargement…</iframe>
    </div>
  </div>
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