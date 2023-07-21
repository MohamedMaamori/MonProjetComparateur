<!DOCTYPE html>
<!--
MotDePasseOublieView3.php
/PDOCours/modele_site_procedural_FO
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>MotDePasseOublieViewEtape3</title>
    <style>
        section{
            margin-top: 10%;
            margin-left: 15%;
            padding:  1%;
            border: dimgray 1px solid;
            text-align: center;
            width: 40%;
        }
        input[type="submit"]{
            background-color: black;
            color: white;
            padding: 1%;
            width: 30%;
        }
    </style>
</head>
<body>
<?php
$mail = filter_input(INPUT_COOKIE, "mail");
if ($mail == null){
    $mail ="zzz";
}
?>
<section>
    <h1>Mot De Passe Oublié Etape 3</h1>
    <p>
        <strong>
            Vous devez modifier votre nouveau mot de passe dans les 30 minutes !
        </strong>
    </p>
    <form method="POST" action="../controllers/MotDePasseOublieCTRL3.php">
        <p>
            Saisissez votre nouveau mot de passe<br>
            <input type="text" name="mdp1" value="" placeholder="Mot de passe ?" />
        </p>
        <p>
            Ressaisissez votre nouveau mot de passe<br>
            <input type="text" name="mdp2" value="" placeholder="Mot de passe ?" />
        </p>
        <p>
            <input type="submit" value="Valider" name="btValider" />
        </p>
        <input type="text" name="mail" value="<?php echo $mail; ?>" />
        <br>
        <?php
        //                echo "<br>Session : " . $_SESSION["mail"];
        //                echo "<br>Cookie : " . filter_input(INPUT_COOKIE, "mail");
        ?>
    </form>
    <p>
        <?php
        if (isSet($message)) {
            echo $message;
        }
        ?>
    </p>
</section>
</body>
</html>
