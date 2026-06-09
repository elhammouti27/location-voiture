<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - EHM</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>

    <!-- HEADER -->
    <header class="header">
        <img src="/assets/img/EHN-logo.png" alt="Logo EHM" class="logo-right">

        <div class="auth">
            <a href="/pages/connexion.php" class="btn-primary">Connexion</a>
            <a href="/pages/inscription.php" class="btn-primary">S’inscrire</a>

        </div>
    </header>

    <!-- NAVIGATION -->
    <nav class="navbar-expand">
        <ul id="nav-links">
            <li><a href="/index.php">Accueil</a></li>
            <li><a href="/pages/apropos.php">À Propos</a></li>
            <li><a href="/pages/reservation.php">Réservation</a></li>
            <li><a href="/pages/contact.php" class="active">Contact</a></li>
        </ul>
    </nav>

    <!-- CONTENU CONTACT -->
    <main class="contact-container">

        <h1 class="contact-title">Contactez-nous</h1>

        <p class="contact-subtitle">
            Une question, une demande ou un problème ? Envoyez-nous un message.
        </p>

        <form action="traitement_contact.php" method="POST" class="contact-form">

            <label>Nom</label>
            <input type="text" name="nom" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Message</label>
            <textarea name="message" rows="5" required></textarea>

            <button type="submit" class="contact-btn">Envoyer</button>
        </form>

    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <p>Politique de confidentialité - Conditions générales d’utilisation</p>
        <p>© 2026 EHM. Tous droits réservés.</p>
    </footer>

</body>

</html>