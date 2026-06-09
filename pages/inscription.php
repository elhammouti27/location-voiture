<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EHN - Inscription</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>

    <header class="header">
        <img src="/assets/img/EHN-logo.png" alt="Logo EHM" class="logo-right">
    </header>

    <nav class="navbar-expand">
        <ul id="nav-links">
            <li><a href="/index.php">Accueil</a></li>
            <li><a href="/pages/propos.php">À Propos</a></li>
            <li><a href="/pages/reservation.php">Réservation</a></li>
            <li><a href="/pages/contact.php">Contact</a></li>
        </ul>
    </nav>

    <main class="inscription-container">

        <h1 class="inscription-title">EHN Location de Voiture</h1>

        <form action="traitement_inscription.php" method="POST" class="inscription-form">

            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" required>

            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>

            <label for="password2">Confirmation de mot de passe</label>
            <input type="password" id="password2" name="password2" required>

            <button type="submit" class="inscription-btn">Créer le compte</button>

        </form>

    </main>

    <footer class="footer">
        <p>Politique de confidentialité - Conditions générales d’utilisation</p>
        <p>© 2026 EHM. Tous droits réservés.</p>
    </footer>

</body>

</html>