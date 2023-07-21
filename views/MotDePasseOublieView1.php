<!DOCTYPE html>
<!--
MotDePasseOublieView.php
/PDOCours/modele_site_procedural_FO
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>MotDePasseOublieView</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../css/style.css" />
</head>
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
    #retour{
        margin-top: -0.5%;
        text-align: left;
    }
    #lienRetour{
        text-decoration: none;
        color: dimgray;
    }
</style>

<body>
<section>
    <?php
    //$precedente = $_SERVER['HTTP_REFERER'];
    //$precedente = "http://" . $_SERVER["REMOTE_ADDR"] . "/PDOCours/modele_site_procedural_FO/boundaries/AuthentificationView.php";
    //$precedente = "http://localhost/PDOCours/modele_site_procedural_FO/boundaries/AuthentificationView.php";
    ?>

    <h1>MOT DE PASSE OUBLIE Etape 1</h1>

    <form method="POST" action="../controllers/MotDePasseOublieCTRL2.php">
        <fieldset>
        <p>
            Si vous avez oublié votre mot de passe, veuillez saisir votre adresse email.
            <br>
            Nous vous enverrons un lien pour réinitialiser votre mot de passe.
        </p>
        <label>
            Adresse e-mail :
        </label>
        <br/>
        <input type="mail" name="mail" value="mohamed.maamori67@gmail.com" placeholder="mail ?" size="50"/>
        <p>
            <input type="submit" value="Valider" name="btValider" />
        </p>
        <p id="retour">
            <a id="lienRetour" href="https://mohamedmaamori.alwaysdata.net/MonProjetComparateur/views/Accueil.php">&lt;&nbsp;&nbsp;&nbsp;RETOUR</a>
        </p>
            </fieldset>
    </form>

</section>
<?php
// put your code here
?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
</body>
</html>


