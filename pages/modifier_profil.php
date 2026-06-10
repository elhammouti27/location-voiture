<?php
session_start();
require_once "../db.php";

// Si pas connecté → retour connexion
if (!isset($_SESSION["user"])) {
    header("Location: /pages/connexion.php");
    exit;
}

$user = $_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Profil</title>
</head>
<body>

<h2>Modifier mon profil</h2>

<form action="traitement/traitement_modifier_profil.php" method="POST">

    <label>Prénom :</label>
    <input type="text" name="firstname" value="<?= $user['firstname'] ?>" required><br><br>

    <label>Nom :</label>
    <input type="text" name="lastname" value="<?= $user['lastname'] ?>" required><br><br>

    <label>Téléphone :</label>
    <input type="text" name="phone_number" value="<?= $user['phone_number'] ?>" required><br><br>

    <label>Permis :</label>
    <input type="text" name="permis" value="<?= $user['permis'] ?>" required><br><br>

    <button type="submit">Enregistrer</button>
    
</form>

</body>
</html>
