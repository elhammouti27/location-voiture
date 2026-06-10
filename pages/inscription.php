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

        <form action="traitement/traitement_inscription.php" method="POST" class="inscription-form">


            <label>Nom</label>
            <input type="text" name="firstname" required>

            <label>Prénom</label>
            <input type="text" name="lastname" required>

            <label>Carte d'identité (CIN)</label>
            <input type="text" name="cin">

            <label>Numéro de téléphone</label>
            <input type="text" name="phone_number">

            <label>Email</label>
            <input type="email" name="email">

            <label>Permis de conduire</label>
            <input type="text" name="permis">

            <label>Mot de passe</label>
            <input type="password" name="password">


            <button type="submit" class="inscription-btn">Créer le compte</button>

        </form>

    </main>

    <footer class="footer">
        <p>Politique de confidentialité - Conditions générales d’utilisation</p>
        <p>© 2026 EHM. Tous droits réservés.</p>
    </footer>

</body>

</html>