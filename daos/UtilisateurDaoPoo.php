<?php


/*
 * UtilisateurDaoPoo.php
 */
// PHP 8 full
declare(strict_types=1);

// On charge le fichier
require_once '../entities/Utilisateur.php';

// Déclaration de la classe
class UtilisateurDaoPoo
{

    // On déclare un attribut
    private PDO $pdo;

    // Le constructeur qui a comme paramètre un objet PDO et qui sera exécuté automatiquement quand on va instancier l'objet
    function __construct(PDO $pdo)
    {
        // On affecte la valeur du paramètre à l'attribut
        $this->pdo = $pdo;
    }

    /**
     * Déclaration de la méthode INSERT :: input : un objet pays , output : un numérique entier
     * @param Utilisateur $utilisateur
     * @return int
     */
    public function insert(Utilisateur $utilisateur): int
    {
        // Déclaration d'une variable qui servira pour le retour
        $affected = 0;

        try {
            // Compilation ...
            $cmd = $this->pdo->prepare("INSERT INTO utilisateur(nom, prenom, pseudo, ville, mail, mdp) VALUES(?,?,?,?,?,?)");
            // Valorisation des paramètres (les ?) avec le résultat de la sollicitation de la méthode GETTER de l'objet Pays
            $cmd->bindValue(1, $utilisateur->getNom());
            $cmd->bindValue(2, $utilisateur->getPrenom());
            $cmd->bindValue(3, $utilisateur->getPseudo());
            $cmd->bindValue(4, $utilisateur->getVille());
            $cmd->bindValue(5, $utilisateur->getMail());
            $cmd->bindValue(6, $utilisateur->getMdp());
            // On exécute la roquette
            $cmd->execute();
            // Nombre de lignes affectées (0 ou 1)
            $affected = $cmd->rowCount();
        } catch (PDOException $e) {
            $affected = -1;
            //echo $e->getMessage();
        }

        // Le retour de la méthode (l'output)
        return $affected;
    }
        public function delete (Utilisateur $utilisateur):int {
        $affected=0;
        $sql = "DELETE FROM utilisateur WHERE prenom=?";
        try {
            $cmd = $this->pdo->prepare($sql);
            $cmd->bindValue(1, $utilisateur->getPrenom());
            $cmd->execute();

            $affected = $cmd->rowCount();
        } catch (PDOException $e) {
            $affected= -1;
            //throw $th;
        }
        return $affected;
    }

    public function update(Utilisateur $utilisateur): int {
        $affected=0;
        try{


            $sql = "UPDATE utilisateur SET nom = ? WHERE id_utilisateur=?";
            $cmd = $this->pdo->prepare($sql);
            $cmd->bindValue(1, $utilisateur->getNom());
            $cmd->bindValue(2, $utilisateur->getIdutilisateur());
            // On exécute la roquette
            $cmd->execute();
            $affected = $cmd->rowCount();
        } catch (PDOException $e) {
            $affected = -1;
        }

        return $affected;

    }

    public function selectOne(string $pk): utilisateur
    {
        // on instancie un objet pays
        $utilisateur = new utilisateur();
        // ordre SQL select en fonction de la PK
        $sql = "SELECT * FROM `utilisateur` WHERE id_utilisateur =?";
        try {
            // on compile l'ordre SQL
            $cursor = $this->pdo->prepare($sql);
            // on valorise le 1er paramètre le (?)
            $cursor->bindValue(1, $pk);
            // on l'execute l'ordre SQL
            $cursor->execute();
            // extrait la ligne courante du curseur
            $record = $cursor->fetch();
            // si le curseur est vide
            if ($record === FALSE) {
                // on valorise via un setter les attributs de l'objet utilisateur
                $utilisateur->setNom("0");
                $utilisateur->setPseudo("Introuvable");
            } else {
                $utilisateur->setNom($pk);
                $utilisateur->setPseudo($record["pseudo"]);
            }

        } catch (PDOException $e) {
            $utilisateur->setNom("-1");
            $utilisateur->setPseudo($e->getMessage());
        }

        return $utilisateur;
    }
    public function selectAll(PDO $pdo): array {
        /*
         * Renvoie un tableau ordinal d'objets Utilisateur
         */
        $result = array();
        try {
            $cursor = $pdo->query("SELECT * FROM utilisateur");
            // Renvoie un tableau ordinal de tableaux associatifs
            $list = $cursor->fetchAll();
            for ($i = 0; $i < count($list); $i++) {
                $utilisateur = new Utilisateur($list[$i]["id_utilisateur"], $list[$i]["nom"]);

                $result[] = $utilisateur;
            }
        } catch (PDOException $e) {
            $utilisateur = new Utilisateur("0", $e->getMessage());
            $result[] = $utilisateur;
        }
        return $result;
    }


}
?>