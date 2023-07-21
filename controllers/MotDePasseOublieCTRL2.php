<?php

/*
 * MotDePasseOublieCTRLEtape2.php
 * /PDOCours/modele_site_procedural_FO
 */

$mail = filter_input(INPUT_POST, "mail");
setcookie("mail",$mail,time()+(3600),"/");
//$newPWD = "Zorro007#"; // A générer de façon aléatoire

/*
 * Mise à jour dans la table
 */

//require_once '../daos/ConnectionDB.php';
//
//$pdo = getConnection("../conf/cours.ini");
//// TRY / catch
//$sql = "UPDATE utilisateurs SET mdp = ? WHERE email = ?";
//$cmd = $pdo->prepare($sql);
//$cmd->bindValue(1, $newPWD);
//$cmd->bindValue(2, $email);
//$affected = $cmd->execute();

/*
 * Envoi d'un email avec un mot de passe provisoire !!!
 */
ini_set("SMTP", "smtp-mohamedmaamori.alwaysdata.net");
//ini_set("smtp_port", "25");
ini_set("sendmail_from", "mohamed.maamori67@gmail.com"); // --- Remplace le FROM dans les entêtes
//$destinataire = "$email";
// --- utf8_decode() : UTF8 vers ISO 8859-1
$objet = utf8_decode("Changer votre mot de passe");

$message = "";
$message .= "<div style='background-color:silver;text-align:center;width=300px'>";
$message .= "<p style='font-size:large;'>Mot de passe oublié ! No Problemo</p>";
$message .= "<p style='font-size:large;'>Pour créer un nouveau mot de passe, cliquez sur le bouton</p>";
$message .= "<p><a style='display:inline-block;font-size:large;background-color:black;color:white;text-decoration:none;padding-top:10px;padding-bottom:10px;padding-left:100px;padding-right:100px;' href='http://mohamedmaamori.alwaysdata.net/MonProjetComparateur/views/MotDePasseOublieView3.php'>Cliquez</a></p>";
$message .= "";
$message .= "<p style='background-color:white;color:dimgray;padding:10px'>Ce lien est valable 1 heure et est à usage unique.</p>";
$message .= "</div>";

$entetes = "Content-Type: text/html; charset=UTF-8\r\n";
$entetes .= "Content-Transfer-Encoding: 8bit\n";
//$entetes .= "From: mohamed.maamori67@gmail.com\r\n";

$bOk = mail($mail, $objet, $message, $entetes);
if ($bOk) {
    $message = "Mail 1 envoy&eacute; avec succ&egrave;s; Consultez votre boîte de réception de votre messagerie !";
} else {
    $message = "Erreur d'envoi du Mail 1";
}

include "../views/MotDePasseOublieView2.php";
?>
