<?php
session_start();

// Si l'utilisateur n'est pas connecté → on le renvoie à la connexion
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
    <title>Profil</title>
    <style>
        .profil-container {
            width: 400px;
            margin: 50px auto;
            padding: 25px;
            border-radius: 10px;
            background: #f5f5f5;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
        }

        .profil-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .profil-item {
            margin-bottom: 12px;
            font-size: 16px;
        }

        .profil-label {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="profil-container">
        <h2>Mon Profil</h2>

        <div class="profil-item">
            <span class="profil-label">Prénom :</span> <?= $user["firstname"] ?>
        </div>

        <div class="profil-item">
            <span class="profil-label">Nom :</span> <?= $user["lastname"] ?>
        </div>

        <div class="profil-item">
            <span class="profil-label">Email :</span> <?= $user["email"] ?>
        </div>

        <div class="profil-item">
            <span class="profil-label">Téléphone :</span> <?= $user["phone_number"] ?>
        </div>

        <div class="profil-item">
            <span class="profil-label">CIN :</span> <?= $user["cin"] ?>
        </div>

        <div class="profil-item">
            <span class="profil-label">Permis :</span> <?= $user["permis"] ?>
        </div>

        <br>
        <a href="/pages/modifier_profil.php">Modifier mon profil</a>
        <br>
        <a href="/pages/supprimer_compte.php" style="color:red;">Supprimer mon compte</a>

        <br>
        <a href="/pages/traitement/logout.php">Déconnexion</a>

        <br>
        <button onclick="history.back()">
            Retour
        </button>

    </div>

</body>

</html>