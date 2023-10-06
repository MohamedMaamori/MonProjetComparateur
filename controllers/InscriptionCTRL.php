<?php
// --- SQL paramétré : InscriptionCTRL.php
// Inclusion de la "bibliothèque" Connexion
require_once '../lib/connexion.php';
// Inclusion de la "bibliothèque" du DAO
require_once '../daos/UtilisateurDAO.php';
require_once '../entities/Utilisateur.php';
$message = "";
$erreur = 0;
// Récupération des saisies utilisateur
//$Id_utilisateur = filter_input  (INPUT_POST, "id_utilisateur");
$Nom = filter_input  (INPUT_POST, "nom");
$Prenom = filter_input  (INPUT_POST, "prenom");
$Pseudo  = filter_input  (INPUT_POST, "pseudo");
$Ville  = filter_input  (INPUT_POST, "ville");
$Mail = filter_input (INPUT_POST, "mail");
$Mdp = filter_input  (INPUT_POST, "mdp");
// Test de la validité des saisies
if ( $Nom != null && $Prenom != null && $Pseudo != null && $Ville != null && $Mail != null && $Mdp != null) {
try {
$pdo = seConnecter("../conf/Comparateur_carburant.ini");
//$pdo->beginTransaction();
$tAttributesValues = array();
// Ajout d'items dans le tableau et affectation des
 $tAttributesValues['nom'] = $Nom;
 $tAttributesValues['prenom'] = $Prenom;
 $tAttributesValues['pseudo'] = $Pseudo;
 $tAttributesValues['ville'] = $Ville;
 $tAttributesValues['mail'] = $Mail;
 $tAttributesValues['mdp'] = $Mdp;
// Appel de la fonction du DAO
$dao = new UtilisateursDAO();
 $affected = $dao->insert($pdo, $tAttributesValues);
 if ($affected === 1) {
 $message = "Nouveau utilisateur ajouter avec succes !!!";
 } else {
 $message = "problème d'insertion veuillez contacter vôtre administrateur";
}
 $pdo = null;
 } catch (PDOException $e) {
 $message = $e->getMessage();
 }
} else {
 $message = "Toutes les saisies sont obligatoires";
}
// "Retour" à l'IHM
include '../views/Inscription.php';