<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: AdminPanel.php");
    exit();
}

// Connexion à la base de données
$servername = "mysql-mohamedmaamori.alwaysdata.net";
$username_db = "308228";
$password_db = "m2i123formation";
$dbname = "mohamedmaamori_comparateur_carburant";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username_db, $password_db);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

require_once '../daos/UtilisateurDAO.php'; // Inclure votre classe UtilisateursDAO

// Traitement pour ajouter un utilisateur
if (isset($_POST['create'])) {
    $newNom = $_POST['newNom'];
    $newPrenom = $_POST['newPrenom'];
    $newPseudo = $_POST['newPseudo'];
    $newVille = $_POST['newVille'];
    $newMail = $_POST['newMail'];
    $newPassword = $_POST['newPassword'];

    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $utilisateursDAO = new UtilisateursDAO();
    $inserted = $utilisateursDAO->insert($conn, [
        "nom" => $newNom,
        "prenom" => $newPrenom,
        "pseudo" => $newPseudo,
        "ville" => $newVille,
        "mail" => $newMail,
        "mdp" => $hashedPassword
    ]);

    if ($inserted > 0) {
        echo "Utilisateur créé avec succès.";
    } else {
        echo "Erreur lors de la création de l'utilisateur.";
    }
}

// Traitement pour supprimer un utilisateur
if (isset($_POST['delete'])) {
    $userId = $_POST['userId'];

    $utilisateursDAO = new UtilisateursDAO();
    $deleted = $utilisateursDAO->delete($conn, $userId);

    if ($deleted > 0) {
        echo "Utilisateur supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'utilisateur.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panneau d'Admin - Gestion des Utilisateurs</title>
    <link rel="stylesheet" href="../css/style2.css">
</head>
<body>

<h2>Panneau d'Administration - Gestion des Utilisateurs</h2>

<div class="container">
    <div class="form-container">
        <h3>Créer un nouvel utilisateur</h3>
        <form action="AdminPanel.php" method="post">
            <label for="newNom">Nom :</label>
            <input type="text" name="newNom" required>
            <label for="newPrenom">Prénom :</label>
            <input type="text" name="newPrenom" required>
            <label for="newPseudo">Pseudo :</label>
            <input type="text" name="newPseudo" required>
            <label for="newVille">Ville :</label>
            <input type="text" name="newVille" required>
            <label for="newMail">E-mail :</label>
            <input type="email" name="newMail" required>
            <label for="newPassword">Mot de passe :</label>
            <input type="password" name="newPassword" required>
            <button type="submit" name="create">Créer</button><br><br>
        </form>
    </div>
    <!-- Liste des utilisateurs -->
    <div class="user-list-container">
        <h3>Liste des utilisateurs</h3>
        <ul>
            <?php
            // Récupérer la liste des utilisateurs
            $utilisateursDAO = new UtilisateursDAO();
            $usersList = $utilisateursDAO->selectAll($conn);
            foreach ($usersList as $user) {
                echo '<li>';
                echo $user['pseudo'];
                echo '<form action="AdminPanel.php" method="post">';
                echo '<input type="hidden" name="userId" value="' . $user['id_utilisateur'] . '">';
                echo '<button type="submit" name="delete">Supprimer</button>';
                echo '</form>';
                echo '</li>';
            }
            ?>
        </ul>
    </div>
</div>
</body>
</html>
