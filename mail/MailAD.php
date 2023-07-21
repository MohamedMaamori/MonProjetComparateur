
<!--DOCTYPE html-->
<!--
mail_ad.php
Ce script est stocké sur AD
http://pascalbuguet.alwaysdata.net/PDOCours/mail/mail_ad.php
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>mail_ad</title>
    </head>
    <body>
        <h1>Mail AlwaysData</h1>
        <?php
        $message = "";
        $btValider = filter_input(INPUT_POST, "btValider");
        if ($btValider != null) {
            //ini_set("SMTP", "smtp.sfr.fr");
            ini_set("SMTP", "smtp-mohamedmaamori.alwaysdata.net");
            ini_set("sendmail_from", "mohamed.maamori67@gmail.com");

            $destinataire = filter_input(INPUT_POST, "destinataire");
            $objet = filter_input(INPUT_POST, "objet");
            $texte = filter_input(INPUT_POST, "texte");
            $entetes = "Content-Type: text/html; charset=UTF-8\r\n";
            $entetes .= "Content-Transfer-Encoding: 8bit\n";

            $bOk = mail($destinataire, $objet, $texte, $entetes);
            if ($bOk) {
                $message = "Mail 1 envoy&eacute; avec succ&egrave;s";
             } else {
                $message = "Erreur d'envoi du mail 1";
            }
        }
        ?>

        <form method="POST">
            <table border="0" cellpadding="3">
                <tr>
                    <td>Destinataire : </td>
                    <td><input type="text" name="destinataire" value="mohamed.maamori67@gmail.com" size="50" /></td>
                </tr>
                <tr>
                    <td>Objet : </td>
                    <td><input type="text" name="objet" value="Premier exo" /></td>
                </tr>
                <tr>
                    <td>Message : </td>
                    <td><input type="text" name="texte" value="Est-ce que ça va passer?" /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="btValider" /></td>
                </tr>
            </table>
        </form>

        <label>
            <?php
            echo $message;
            ?>
        </label>
    </body>
</html>
