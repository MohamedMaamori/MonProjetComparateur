<?php

/*
  Authentification.php
  SELECT * FROM utilisateurs WHERE pseudo=? AND mdp=?
  Pour tester le code PHP
  http://localhost/MonProjetComparateur/PourFrontJS/php/authentification.php
  http://elm.alwaysdata.net/PourFrontJS/php/Authentification.php
 */
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
session_start();

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST["inputPseudo"];
    $mdp = $_POST["inputMdp"];

    // Vérifier les informations d'authentification (vous devez implémenter cette vérification)
    if (verifierAuthentification($pseudo, $mdp)) {
        // Authentification réussie
        $_SESSION["pseudo"] = $pseudo;
        header("Location: tableau_de_bord.php"); // Rediriger vers la page de tableau de bord
        exit();
    } else {
        $message = "Identifiant ou mot de passe incorrect";
    }
}

try {
    //$pdo = new PDO("mysql:host=mysql-m2icdi.alwaysdata.net;dbname=m2icdi_cours", "m2icdi", "mdp12345");
    $pdo = new PDO("mysql:host=localhost;dbname=comparateur_carburant", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES 'UTF8'");
    $mail = filter_input(INPUT_GET, "pseudo");
    $mdp = filter_input(INPUT_GET, "mdp");
    $sql = "SELECT * FROM utilisateur WHERE pseudo=? AND mdp=?";
    $cursor = $pdo->prepare($sql);
    $cursor->bindParam(1, $pseudo);
    $cursor->bindValue(2, $mdp);
    $cursor->execute();
    // On essaie de récuperer le premier enregistrement du curseur
    $enregistrement = $cursor->fetch();
    // Si le curseur est vide, donc que fetch renvoi FALSE
    if ($enregistrement === FALSE) {
        // On creee un objet JSON
        $message["message"] = 0;
    } else {
        $message["message"] = 1;
    }
    $pdo = null;
} catch (PDOException $e) {
    $message["message"] = -1;
}

echo json_encode($message);

?>