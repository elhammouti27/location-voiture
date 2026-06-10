<?php
session_start();

// Si pas connecté → retour connexion
if (!isset($_SESSION["user"])) {
    header("Location: /pages/connexion.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer mon compte</title>
</head>
<body>

<h2 style="color:red;">Supprimer mon compte</h2>

<p>Es-tu sûr de vouloir supprimer ton compte ? Cette action est irréversible.</p>

<a href="/pages/traitement/traitement_supprimer_compte.php" style="color:white; background:red; padding:10px; text-decoration:none;">Oui, supprimer</a>
<br><br>
<a href="/pages/profil.php">Annuler</a>

</body>
</html>
