<!DOCTYPE html>
<!--
MotDePasseOublieView2.php
/PDOCours/modele_site_procedural_FO
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>MotDePasseOublieViewEtape2</title>
    <style>
        section{
            margin-top: 10%;
            margin-left: 15%;
            padding:  1%;
            border: dimgray 1px solid;
            text-align: center;
            width: 40%;
        }
        ul{
            text-align: left;
        }
    </style>
</head>
<body>
<section>
    <h1>MOT DE PASSE OUBLIE Etape 2</h1>
    <p>
        Un lien pour réinitaliser votre mot de passe
        <br>
        vous a été envoyé à l'adresse mail suivante <strong><?php echo $mail; ?></strong>
    </p>
    <p>
    <ul>
        <li>
            Les courriels peuvent subir un délai de quelques minutes
        </li>
        <li>
            Si vous n'avez pas reçu de courriel, vérifiez dans les couriels indésirables
        </li>
    </ul>
    </p>

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
