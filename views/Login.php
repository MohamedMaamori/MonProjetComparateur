<?php
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connectez-vous à votre base de données ici et vérifiez les informations d'identification

    // Si les informations d'identification sont valides, vous pouvez rediriger vers le panneau d'administration
    if ($username === "admin" && $password === "simo1234") {
        $_SESSION['admin'] = true;
        header("Location: AdminPanel.php");
        exit();
    } else {
        $error_message = "Identifiants invalides";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Back Office - Connexion Administrateur</title>
</head>
<body>
<div class="container">
    <h2>Connexion Administrateur</h2>
    <form action="Login.php" method="post">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" name="username" required>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required>
        <button type="submit" name="login">Se connecter</button>
        <?php if (isset($error_message)) { ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php } ?>
    </form>
</div>
</body>
</html>


echo '<div class="promotion">';
    echo '<img src="' . $imagePath . '" class="promotion-image" alt="Promotion">';
    echo '<div class="promotion-details">';
        echo '<p>Utilisez le code de promotion: <strong>' . $code . '</strong></p>';
        echo '<p>Découvrez nos offres spéciales sur les carburants!</p>';
        echo '</div>';
    // Bouton d'ajout au panier
    echo '<button class="add-to-cart" data-code="' . $code . '">Ajouter au panier</button>';
    echo '</div>';
