<!DOCTYPE html>
<!--
C:\xampp\htdocs\PDOCours\AuthentificationAvecJeton\
AuthentificationAvecJetonView.php
http://localhost/PDOCours/AuthentificationAvecJeton/AuthentificationAvecJetonView.php

-->
<html>
<head>
    <meta charset="UTF-8">
    <title>AuthentificationAvecJetonView</title>
</head>
<body>
<h1>AuthentificationAvecJetonView</h1>
<form action="" method="POST">
    <input type="text" name="pseudo" value="" />
    <input type="text" name="mdp" value="" />
    <input type="submit" />
</form>
<?php
//setcookie("jeton_authentification", "abc", time() + (3600 * 24 * 14));
$message = "";
$pseudo = filter_input(INPUT_POST, "pseudo");
$mdp = filter_input(INPUT_POST, "mdp");

if ($pseudo != null && $mdp != null) {
    echo "<hr>$pseudo<hr>";
    echo "<hr>$mdp<hr>";
    try {
        // Connexion
        $cnx = new PDO("mysql:host=mysql-mohamedmaamori.alwaysdata.net;port=3306;dbname=mohamedmaamori_comparateur_carburant;", "308228", "m2i123formation");
        $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $cnx->exec("SET NAMES 'UTF8'");
        // Préparation et exécution du SELECT SQL
        $select = "SELECT * FROM utilisateur WHERE pseudo = ? AND mdp = ?";
        $curseur = $cnx->prepare($select);
        $curseur->bindValue(1, $pseudo);
        $curseur->bindValue(2, $mdp);
        $curseur->execute();

        $record = $curseur->fetch();
        if ($record == false) {
            $_SESSION["connecte"] = 0;
            $message = "ID ou mot de passe incorrects";
        } else {
            $cookieJeton = filter_input(INPUT_COOKIE, "jeton_authentification");
            echo "<hr>$cookieJeton<hr>";

            $jetonBD = $record["jeton"];
            echo "<hr>$jetonBD<hr>";
            if ($jetonBD == $cookieJeton) {
                $_SESSION["connecte"] = 1;
                $message = "Connexion OK";
            } else {
                $_SESSION["connecte"] = 0;
                $message = "Connexion OK : jeton incorrect";
            }
        }
        $curseur->closeCursor();
    }
        // Gestion des erreurs
    catch (PDOException $e) {
        $message = $e->getMessage();
    }
    $cnx = null;
}
?>
<p>
    <?php
    echo $message;
    ?>
</p>

<a href="MonCompte.php">Mon compte</a>
</body>
</html>
