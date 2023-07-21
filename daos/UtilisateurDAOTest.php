<?php

/* UtilisateurDAOTests.php */

require_once '../lib/Connexion.php';
//require_once '../lib/Transaxion.php';
require_once 'UtilisateurDAO.php';

$pdo = seConnecter("../conf/comparateur_carburant.ini");

/**echo "<hr>selectAll<hr>";
$content = "";
$lines = selectAll($pdo);

foreach ($lines as $line) {
    foreach ($line as $field => $value) {
        $content .= $field . ":" . $value . ";";
    }
    $content .= "\n";
}
echo nl2br($content);


/**echo "<hr>selectOne<hr>";
$content = "";
$line = selectOne($pdo, "nom");
foreach ($line as $field => $value) {
    $content .= "$field => $value<br/>";
}
$content .= "\n";
echo nl2br($content);

echo "<hr>insert<hr>";
//$pdo->beginTransaction();
$tAttributesValues = array();
$tAttributesValues['nom'] = "maamori";
$tAttributesValues['prenom'] = "mohamed";
$tAttributesValues['pseudo'] = "pseudo";
$tAttributesValues['ville'] = "strasbourg";
$tAttributesValues['mail'] = "mm@gmail.com";
$tAttributesValues['mdp'] = "mdp123";
$affected = insert($pdo, $tAttributesValues);
echo "Insertion : $affected";
//$pdo->commit();


echo "<hr>delete<hr>";
//    $pdo->beginTransaction();
//    $affected = delete($pdo, "99999");
//    echo "Suppression : $affected";
//    $pdo->commit();
**/
echo "<hr>update<hr>";
$tAttributesValues = array();
$tAttributesValues['id_utilisateur'] = "id_utilisateur";
$tAttributesValues['nom'] = "maamori";
$tAttributesValues['prenom'] = "mohamed";
$tAttributesValues['pseudo'] = "pseudo";
$tAttributesValues['ville'] = "strasbourg";
$tAttributesValues['mail'] = "mm@gmail.com";
$tAttributesValues['mdp'] = "mdp123";
$affected = update($pdo, "nom", $tAttributesValues);
echo "Modification : $affected";

$pdo = null;
?>