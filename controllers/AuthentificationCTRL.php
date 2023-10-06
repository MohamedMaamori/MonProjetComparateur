<?php

/*
 * AuthentificationCTRL
 */
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
$pseudo = "";
$mdp = "";

$btValider = filter_input(INPUT_POST, "btValider");

if ($btValider != null) {
    $pseudo = filter_input(INPUT_POST, "pseudo");
    $mdp = filter_input(INPUT_POST, "mdp");
    if ($pseudo == null || $mdp == null) {
        setcookie("pseudo", "");
        setcookie("mdp", "");
        $message = "Toutes les saisies sont obligatoires";
    } else {
        $message = "Jusque là tout va bien !!!";
        $chkSeSouvenir = filter_input(INPUT_POST, "SeSouvenirDeMoi");
        if ($chkSeSouvenir != null) {
            $message = "Cookie Créer !!!";
            setcookie("pseudo", $pseudo, time() + (3600 * 24 * 7));
            setcookie("mdp", $mdp, time() + (3600 * 24 * 7));
        } else {
            $message = "Pas Coché !!!";
            setcookie("pseudo", "", 0);
            setcookie("mdp", "", 0);
            $pseudo = "";
            $mdp = "";
        }
    }
} else {
    $message = "First time !!!";
}
$tMessage["message"]=$message;
$pseudoCook = filter_input(INPUT_COOKIE, "pseudo");
$mdpCook = filter_input(INPUT_COOKIE, "mdp");
if ($pseudoCook != null && $mdpCook != null) {
    $pseudo = $pseudoCook;
    $mdp = $mdpCook;
}
echo json_encode($tMessage);
//include '../views/Authentification.php';
?>




