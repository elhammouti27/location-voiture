<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EHN - Connexion</title>
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

    <main class="connexion-container">

        <h1 class="connexion-title">EHN Location de Voiture</h1>

        <form action="traitement_connexion.php" method="POST" class="connexion-form">

            <label for="email">email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">mot de passe</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" class="btn-primary connexion-btn" >Se Connecter</button>

            <p class="no-account">
                Vous n’avez pas de compte ?
                <a href="/pages/inscription.php">créez en un !</a>
            </p>

        </form>

    </main>

    <footer class="footer">
        <p>Politique de confidentialité - Conditions générales d’utilisation</p>
        <p>© 2026 EHM. Tous droits réservés.</p>
    </footer>

</body>
</html>