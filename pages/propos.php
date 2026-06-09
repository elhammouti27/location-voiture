<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos - EHM</title>
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
            <li><a href="a propos.php" class="active">À Propos</a></li>
            <li><a href="/pages/reservation.php">Réservation</a></li>
            <li><a href="/pages/contact.php">Contact</a></li>
        </ul>
    </nav>

    <!-- SECTION 1 : QUI SOMMES-NOUS -->
    <section class="apropos-section">
        <div class="apropos-text">
            <h2>Qui sommes-nous</h2>
            <p>
                EHM Location propose des véhicules fiables et modernes pour tous vos déplacements.
                Notre objectif est de vous offrir une expérience simple, rapide et accessible.
            </p>
        </div>

        <div class="apropos-img">
            <img src="/assets/img/keys1.jpg" alt="Remise de clés">
        </div>
    </section>

    <!-- SECTION 2 : NOTRE MISSION -->
    <section class="apropos-section reverse">
        <div class="apropos-text">
            <h2>Notre mission</h2>
            <p>
                Rendre la location simple, rapide et accessible à tous.  
                Nous mettons à votre disposition des véhicules entretenus et un service client réactif.
            </p>
        </div>

        <div class="apropos-img">
            <img src="/assets/img/keys2.jpg" alt="Location de voiture">
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <p>Politique de confidentialité - Conditions générales d’utilisation</p>
        <p>© 2026 EHM. Tous droits réservés.</p>
    </footer>

</body>
</html>
