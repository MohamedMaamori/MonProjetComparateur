<?php

/*
 * MotDePasseOublieCTRL3.php
 * /PDOCours/modele_site_procedural_FO
 */
$mail = filter_input(INPUT_COOKIE, "mail");
if ($mail == null){
    $mail ="zzz";
}
$btValider = filter_input(INPUT_POST, "btValider");
/*
 * Test de validité du mot de passe ...
 */

$message = "";
$view = "MotDePasseOublieView3.php";
$mail = filter_input(INPUT_COOKIE,"mail");
if ($btValider == null) {
    // La première fois que l'on arrive du mail,
    // on récupère l'email stocké dans le cookie
    // pour l'affecter au champ caché du formuaire de création du nouveau mot de passe
    //$email = filter_input(INPUT_COOKIE, "mail");
} else {
    //$mail = filter_input(INPUT_POST, "mail");
    $mdp1 = filter_input(INPUT_POST, "mdp1");
    $mdp2 = filter_input(INPUT_POST, "mdp2");
    if (empty($mdp1) || empty($mdp2)) {
        $message = "Toutes les saisies sont obligatoires !";
        $view = "MotDePasseOublieView3.php";
    } else {
        if ($mdp1 != $mdp2) {
            $message = "Mots de passe différents !";
            $view = "MotDePasseOublieView3.php";
        } else {
            /*
             * Mise à jour dans la table
             */
            require_once '../lib/connexion.php';

            $pdo = seConnecter("../conf/comparateur_carburant_ad.ini");
            // TRY / catch
            // Il faudrait passer dans le futur projet identique mais tout codé en OO
            $sql = "UPDATE utilisateur SET mdp = ? WHERE mail = ?";
            $cmd = $pdo->prepare($sql);
            $cmd->bindValue(1, $mdp1);
            $cmd->bindValue(2, $mail);
            $affected = $cmd->execute();

            // if($affected == 1) { ...
            $message = "Votre mot de passe a été modifié, veuillez vous authentifier.";
            $mdp = "";
            $pseudo = "";
            $view = "Authentification.php";
        }
    }
}
include "../views/Authentification.php";
?>