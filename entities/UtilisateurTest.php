<?php

/*
 * UtilisateurTest.php
 */
// C'est ici qu'il faut le préciser, première ligne de code
declare(strict_types = 1);

require_once './Utilisateur.php';

$utilisateur = new Utilisateur( 0, "maamori", "mohamed", "simo", "strasbourg", "mm@gmail.com", "mdp123");
echo "<br>" . $utilisateur->getNom() . ":" . $utilisateur->getPrenom() . ":" . $utilisateur->getPseudo() . ":" . $utilisateur->getVille() . ":" . $utilisateur->getMail() . ":" . $utilisateur->getMdp();

$utilisateur->setNom("maamori");
$utilisateur->setPrenom("mohamed");
$utilisateur->setPseudo("simo");
$utilisateur->setVille("strasbourg");
$utilisateur->setMail("mm@gmail.com");
$utilisateur->setMdp("mdp123");

echo "<hr><pre>";
var_dump($utilisateur);
echo "</pre><hr>";
?>