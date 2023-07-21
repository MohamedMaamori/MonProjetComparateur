<?php

// UtilisateurDaoPooTest.php


require_once '../entities/Utilisateur.php';
require_once './UtilisateurDaoPoo.php';

try {
    /*
       * Connexion
       */
    $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=comparateur_carburant;", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES 'UTF8'");

    $utilisateur = new Utilisateur(1,"maamori", "lina", "piccola", "vicenza", "ml@gmail.com", "mdp123");

    $dao = new UtilisateurDaoPoo($pdo);

    $affected = $dao->insert($utilisateur);

    if ($affected === -1) {
        echo "Erreur lors de l'ajout";
    } else {
        echo $affected . " enregistrement(s) ajouté(s)";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

    // Test DELETE

   /* $affected = $dao->delete($utilisateur);

    if ($affected === -1) {
        echo "Erreur lors de l'ajout";
    } else {
        echo $affected . " enregistrement(s) supprimé(s)";
    }


}catch (PDOException $e) {
    echo $e->getMessage();*/

 /*
     * TEST DE L'UPDATE
     */
   /* echo "<hr>UPDATE<hr>";
    $nom->setNom("MAAMORIO");
    $affected = $dao->update($pdo, $utilisateur);
    echo "Modification : $affected";*/

    /*$result = $dao->selectOne("3");

    echo $result->getPseudo();

} catch (PDOException $e) {
    echo $e->getMessage();


}
/*
     * TEST DU SELECT ALL
     */
   /* echo "<hr>SELECT ALL<hr>";
    $t = $dao->selectAll($pdo);
    echo "<pre>";
    var_dump($t);
    echo "</pre>";

   // for ($i = 0; $i < count($t); $i++) {
       // echo "<br>" . $t[$i]->getIdutilisateur() . " - " . $t[$i]->getNom();
    //}

    foreach ($t as $objet) {
        echo "<br>" . $objet->getIdUtilisateur() . " - " . $objet->getNom();

    }
    $pdo = null;
} catch (PDOException $exc) {
    echo $exc->getMessage();
}*/
?>
