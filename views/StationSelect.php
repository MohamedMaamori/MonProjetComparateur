<?php
// --- StationSelect.php
header("Content-Type: text/html; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Origin: *");


try {
    // Connection php avec la base de données MySQL
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=comparateur_carburant;", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES 'UTF8'");

    // Préparation et exécution du SELECT query qui renvoie un curseur
    // le curseur
    $select = "SELECT id_station, cp, nom_station, adresse_station FROM station";
    $curseur = $pdo->query($select);
    $curseur->setFetchMode(PDO::FETCH_NUM);

    $contenu = "";

    // On boucle sur les lignes en récupérant le contenu des colonnes 1 et 2
    //boucle foreach  dans le curseur qui récupère à chaque fois un enregistrement
    foreach($curseur as $enregistrement) {
        // Récupération des valeurs par concaténation et interpolation
        $contenu .= "$enregistrement[0]-$enregistrement[1]-$enregistrement[2]-$enregistrement[3]<br>";
    }
    // Fermeture du curseur (facultatif)
    $curseur->closeCursor();
}
    // Gestion des erreurs
catch(PDOException $e) {
    $contenu = "Echec de l'exécution : " . $e->getMessage();
}

// Déconnexion (facultative)
$pdo = null;

// Affichage du contenu
echo $contenu;

?>

    <!--ou pour la boucle while avec un fetch :

    while($enregistrement = $curseur->fetch()) {
    $contenu .= "$enregistrement[0]-$enregistrement[1]<br>";
    }--><?php
