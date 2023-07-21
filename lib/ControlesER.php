<?php

/*
 * ControlesER.php
 */

function isEmail($psChaine) {
    $motif = "/^[0-9a-zA-Z_-]+([.][0-9a-zA-Z_-]+)?@[0-9a-zA-Z._-]{2,}[.][a-zA-Z]{2,5}$/";
    return preg_match($motif, $psChaine);
}

function isMDPFort($psChaine) {
    $motif = "/^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{6,10}$/";
    return preg_match($motif, $psChaine);
}

function isCPFR($psChaine) {
    $motif = "/[0-9]{5}/";
    return preg_match($motif, $psChaine);
}

function isTelephoneFR($psChaine) {
    $motif = "/^0[1-9](-[0-9]{2}){4}$/";
    return preg_match($motif, $psChaine);
}

function isEntier($psChaine) {
    $motif = "/^[-]?[0-9]+$/";
    return preg_match($motif, $psChaine);
}

function isEntierPositif($psChaine) {
    $motif = "/^[0-9]+$/";
    return preg_match($motif, $psChaine);
}

function isEntierNegatif($psChaine) {
    $motif = "/^-[0-9]+$/";
    return preg_match($motif, $psChaine);
}

function isDecimal($psChaine) {
    $motif = "/^[-]?[0-9]*[.]?[0-9]+$/";
    return preg_match($motif, $psChaine);
}

function isDecimalFR($psChaine) {
    $motif = "/^[-]?[0-9]*[,]?[0-9]+$/";
    return preg_match($motif, $psChaine);
}

function isNomSansAccent($psChaine) {
    $motif = "/^[A-Z][A-Za-z '-]+$/";
    return preg_match($motif, $psChaine);
}

function isNomAvecAccent($psChaine) {
    $motif = "/^[A-Z][A-Za-zàâäéèêëîïôöüûù '-]+$/";
    return preg_match($motif, $psChaine);
}

function isSnakeCase($psChaine) {
    $motif = "/^([a-z]{1,}_){1,}[a-z]{1,}$/";
    return preg_match($motif, $psChaine);
}

function isCamelCase($psChaine) {
    // TODO
}

function isKebabCase($psChaine) {
    // TODO
    $motif = "/^([a-z]{1,}-){1,}[a-z]{1,}$/";
    return preg_match($motif, $psChaine);
}

?>