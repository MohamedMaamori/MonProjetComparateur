<?php

/*
 * UtilisateurCTRL.php
 */

$tableName = filter_input(INPUT_GET, "tableName");
$lines = array();
$firstLine = array();
if ($tableName != null) {
    try {
        // Connexion
        $pdo = new PDO("mysql:host=localhost;dbname=comparateur_carburant", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES 'UTF8'");

        // Exécution de la requête
        $cursor = $pdo->query("SELECT * FROM $tableName");
        $cursor->setFetchMode(PDO::FETCH_ASSOC);
        
        // Chargement de toutes les données
        // Tableau ordinal de tableaux ordinaux
        $lines = $cursor->fetchAll();
        // La première ligne
        $firstLine = $lines[0];
        // Fermeture du curseur
        $cursor->closeCursor();
    } catch (PDOException $exc) {
        echo $exc->getTraceAsString();
    }
}


include './Utilisateur.php';
?>