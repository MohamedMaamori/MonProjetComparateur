<?php
class UtilisateursDAO
{
    /**
     * UtilisateurDAO.php
     *
     * @param PDO $pdo
     * @param array $tAttributesValues
     * @return int
     */
    function insert(PDO $pdo, array $tAttributesValues): int
    {
        $affected = 0;
        try {
            $sql = "INSERT INTO utilisateur(nom,prenom,pseudo,ville,mail,mdp) VALUES(?,?,?,?,?,?)";
            $statement = $pdo->prepare($sql);

            //$statement->bindValue(1, $tAttributesValues["id_utilisateur"]);
            $statement->bindValue(1, $tAttributesValues["nom"]);
            $statement->bindValue(2, $tAttributesValues["prenom"]);
            $statement->bindValue(3, $tAttributesValues["pseudo"]);
            $statement->bindValue(4, $tAttributesValues["ville"]);
            $statement->bindValue(5, $tAttributesValues["mail"]);
            $statement->bindValue(6, $tAttributesValues["mdp"]);

            $statement->execute();
            $affected = $statement->rowcount();
        } catch (PDOException $e) {
            //echo $e->getMessage();
            $affected = -1;
        }
        return $affected;
    }

    /**
     *
     * @param PDO $pdo
     * @return array
     */
    function selectAll(PDO $pdo): array
    {
        /*
         * Renvoie un tableau ordinal de tableaux associatifs
         */
        $list = array();
        try {
            $cursor = $pdo->query("SELECT * FROM utilisateur");
            // Renvoie un tableau ordinal de tableaux associatifs
            $list = $cursor->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $message = array("message" => $e->getMessage());
            $list[] = $message;
        }
        return $list;
    }

    /**
     *
     * @param PDO $pdo
     * @param string $id
     * @return array
     */
    function selectOne(PDO $pdo, string $id): array
    {
        /*
         * Renvoie un tableau associatif
         */
        try {
            $sql = "SELECT * FROM utilisateur WHERE id_utilisateur = ?";
            $cursor = $pdo->prepare($sql);
            $cursor->bindValue(1, $id);
            $cursor->execute();
            // Renvoie un tableau associatif
            $line = $cursor->fetch(PDO::FETCH_ASSOC);
            if ($line === FALSE) {
                $line["message"] = "Enregistrement inexistant !";
            }
            $cursor->closeCursor();
        } catch (PDOException $e) {
            //$line["Error"] = $e->getMessage();
            $line["Error"] = "Une erreur s'est produite, veuillez téléphoner à votre administrateur de BD, monsieur Mohamed !!!";
        }
        return $line;
    }


    /**
     *
     * @param PDO $pdo
     * @param string $id
     * @return int
     */
    function delete(PDO $pdo, string $id): int
    {
        $affected = 0;
        try {
            $sql = "DELETE FROM utilisateur WHERE id_utilisateur = ?";

            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $id);
            $statement->execute();

            $affected = $statement->rowcount();
        } catch (PDOException $e) {
            $affected = -1;
        }
        return $affected;
    }


    function update(PDO $pdo, string $id, array $tAttributesValues): int
    {
        $affected = 0;
        try {
            $sql = "UPDATE utilisateur SET id_utilisateur = ?,  nom = ?, prenom = ?,pseudo = ?, ville = ?, mail = ? , mdp = ?WHERE id_utilisateur = ?";

            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $tAttributesValues["id_utilisateur"]);
            $statement->bindValue(2, $tAttributesValues["nom"]);
            $statement->bindValue(3, $tAttributesValues["prenom"]);
            $statement->bindValue(4, $tAttributesValues["pseudo"]);
            $statement->bindValue(5, $tAttributesValues["ville"]);
            $statement->bindValue(6, $tAttributesValues["mail"]);
            $statement->bindValue(7, $tAttributesValues["mdp"]);
            $statement->execute();

            $affected = $statement->rowcount();
        } catch (PDOException $e) {
            $affected = -1;
        }
        return $affected;
    }
}
?>