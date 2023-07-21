<?php
// StationTest.php
require_once("Station.php");

// Instanciation d'un objet et utilisation
$fr = new Station(1, "Total", "Strasbourg");

echo "Id : " . $fr->getIdStation() . "<br>";
echo "Nom : " . $fr->getNomStation() . "<br>";
echo "Adresse : " . $fr->getAdresseStation() . "<br>";
