<!DOCTYPE html>
<!--
md5_php_insert_select_delete
-->
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
<?php
$message = "";
$pseudo = filter_input(INPUT_GET, "pseudo");
$pwd = md5("psw000"); // 6cdeb3ca449dcbe5e904fafa6c922df1
try {
    /*
     * Connexion
     */
    $pdo = new PDO("mysql:host=mysql-mohamedmaamori.alwaysdata.net;port=3306;dbname=mohamedmaamori_comparateur_carburant;", "308228", "m2i123formation");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES 'UTF8'");

    $btInsert = filter_input(INPUT_GET, "btInsert");
    $btSelect = filter_input(INPUT_GET, "btSelect");
    $btDelete = filter_input(INPUT_GET, "btDelete");

    if ($btInsert != null) {
        // Le SQL
        $sql = "INSERT INTO utilisateur(nom, prenom, pseudo, ville, mail, mdp) VALUES(?,?,?,?,?,?)";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, "abida");
        $statement->bindValue(2, "fatima");
        $statement->bindValue(3, $pseudo);
        $statement->bindValue(4, "casablanca");
        $statement->bindValue(5, "fati@gmail.com");
        $statement->bindValue(6, $pwd);

        $statement->execute();
        $message = "INSERT OK";
    }
    if ($btDelete != null) {
        // Le SQL
        $sql = "DELETE FROM utilisateur WHERE pseudo = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $pseudo);
        $statement->execute();
        $message = "DELETE OK";
    }
    if ($btSelect != null) {
        // Le SQL
        $sql = "SELECT * FROM utilisateur WHERE mdp=?";
        $cursor = $pdo->prepare($sql);
        $cursor->bindValue(1, $pwd);
        $cursor->execute();
        $line = $cursor->fetch();
        if ($line === FALSE) {
            $message = "INTROUVABLE";
        } else {
            $message = $line[0] . " - " . $line[1];
        }
    }
} catch (PDOException $exc) {
    $message = "Erreur : " . $exc->getMessage();
}
?>
<h1>MD5 - PHP</h1>
<form action="" method="GET">
    <p>
        <label>pseudo ? </label>
        <input type="text" name="pseudo" value="" placeholder="pseudo ? "/>
    </p>
    <p>
        <input type="submit" value="Insert" name="btInsert" />
        <input type="submit" value="Select" name="btSelect" />
        <input type="submit" value="Delete" name="btDelete" />
    </p>
</form>
<p>
    <?php
    echo $message;
    ?>
</p>
</body>
</html>
