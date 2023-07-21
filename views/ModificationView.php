<!DOCTYPE html>
<!-- Une seule page -->
<html>

<head>
  <meta charset="UTF-8">
  <title>ModificationTest.php</title>
  <style>
  h1 {
    font-size: 20px;
  }
  </style>
  <link rel="icon" type="image/png" href="../images/php_noir.png" />
</head>

<body>
  <h1>ModificationTable</h1>
  <?php
        $id_utilisateur = "";
        $nom = "";
        $prenom = "";
        $pseudo = "";
        $ville = "";
        $mail = "";
        $mdp = "";

        try {
            // --- Connexion ... dans tous les cas
            $pdo = new PDO('mysql:host=localhost;dbname=comparateur_carburant', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec("SET NAMES 'UTF8'");

            /*
             * Selection : affichage de la ville selectionnee dans les inputs
             * Si l'utilisateur a cliqué sur le bouton "SELECTIONNER"
             */
            $btSelectionner = filter_input(INPUT_GET, "btSelectionner");
            if ($btSelectionner != null) {
                // Le selectOne()
                $sql = "SELECT id_utilisateur, nom, prenom, pseudo, ville, mail, mdp FROM utilisateur WHERE id_utilisateur = ?";

                $cursor = $pdo->prepare($sql);
                //$cp = filter_input(INPUT_GET, "lbutilisateur");
                $cursor->bindValue(1, filter_input(INPUT_GET, "id_utilisateur"));
                $cursor->execute();

                $record = $cursor->fetch();
                $id_utilisateur = $record[$id_utilisateur];
                $nom = $record["nom"];
                $prenom = $record["prenom"];
                $pseudo = $record["pseudo"];
                $ville = $record["ville"];
                $mail = $record["mail"];
                $mdp = $record["mdp"];
            } // fin if btSelectionner

            /*
             * Modification
             * Si l'utilisateur a cliqué sur le bouton "MODIFIER"
             */
            $btModifier = filter_input(INPUT_GET, "btModifier");
            if ($btModifier != null) {
                $sql = "UPDATE id_utilisateur SET id_utilisateur=?, nom=?, prenom=?, pseudo=?, ville=?, mail=?, mdp=? WHERE id_utilisateur=?";

                $id_utilisateur = filter_input(INPUT_GET, "id_utilsateur");
                $nom = filter_input(INPUT_GET, "nom");
                $prenom = filter_input(INPUT_GET, "prenom");
                $pseudo = filter_input(INPUT_GET, "pseudo");
                $ville = filter_input(INPUT_GET, "ville");
                $mail = filter_input(INPUT_GET, "mail");
                $mdp = filter_input(INPUT_GET, "mdp");



                $statement = $pdo->prepare($sql);

                $statement->bindParam(1, $id_utilisateur);
                $statement->bindParam(2, $nom); // BIND = RELIER
                $statement->bindParam(3, $prenom);
                $statement->bindParam(4, $pseudo);
                $statement->bindParam(5, $ville);
                $statement->bindParam(6, $mail);
                $statement->bindParam(7, $mdp);

                $statement->execute();

                //$statement->execute(array($nomVille, $idPays, $cp));

                $message = $statement->rowcount() . " enregistrement(s) modifié(s)";
            } // fin if btModifier

            /*
             * Remplissage de la liste des villes
             */
            $sql = "SELECT id_utilisateur=?, nom=?, prenom=?, pseudo=?, ville=?, mail=?, mdp=? FROM utilisateur ORDER BY id_utilisateur";
            $cursor = $pdo->query($sql);

            $cp = filter_input(INPUT_GET, "id_utilisateur");
            $options = "";
            while ($record = $cursor->fetch()) {
                // --- Option à sélectionner
                if ($cp != null AND $record['cp'] == $cp) {
                    $options .= "<option value='$record[0]' selected='selected'>$record[1]</option>\n";
                } else {
                    $options .= "<option value='$record[0]'>$record[1]</option>\n";
                }
            }

            // --- Deconnexion
            $pdo = null;
        } // fin try
        catch (PDOException $e) {
            $message = $e->getMessage();
        }
        ?>

  <!--<form action="../controllers/InscriptionCTRL.php" method="post">-->
    <form action="../controllers/UtilisateurCTRL.php.php" method="post">
    <label>Utilisateur </label>
    <select name="id_utilisateur">
      <?php echo $options; ?>
    </select>
    <input type="submit" name="btSelectionner" value="Sélectionner" />

    <br><br>
    <label>nom </label>
    <input type="text" name="nom" value="<?php echo $nom; ?>" size="11"/>
    <label>prenom </label>
    <input type="text" name="prenom" value="<?php echo $prenom; ?>" size="11" />
    <label>pseudo </label>
    <input type="text" name="pseudo" value="<?php echo $pseudo; ?>" size="11"/>
    <label>ville </label>
    <input type="text" name="ville" value="<?php echo $ville; ?>" size="11" />
    <label>mail </label>
    <input type="email" name="mail" value="<?php echo $mail; ?>" size="11"/>
    <label>mdp</label>
    <input type="password" name="mdp" value="<?php echo $mdp; ?>" size="11" />
    <input type="submit" name="btModifier" value="Modifier" />
  </form>

  <p><?php echo $message; ?></p>

</body>

</html>