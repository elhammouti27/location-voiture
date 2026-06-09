<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation - EHM</title>
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
            <li><a href="/pages/propos.php">À Propos</a></li>
            <li><a href="/pages/reservation.php" class="active">Réservation</a></li>
            <li><a href="/pages/contact.php">Contact</a></li>
        </ul>
    </nav>

    <!-- CONTENU RÉSERVATION -->
    <main class="reservation-container">

        <h1 class="reservation-title">Réserver un véhicule</h1>

        <p class="reservation-subtitle">
            Choisissez votre véhicule parmi notre sélection.
        </p>

        <div class="cars-grid">

            <!-- CARD 1 -->
            <div class="car-card">
                <img src="/assets/img/bugatti.jpg" alt="Bugatti">
                <h3>BUGATTI</h3>
                <p class="car-category">HYPERCAR</p>
                <p class="car-price">4500 € / jour</p>
                <a href="#" class="car-btn">Voir plus</a>
            </div>

            <!-- CARD 2 -->
            <div class="car-card">
                <img src="/assets/img/peugeot208.jpg" alt="Peugeot 208">
                <h3>PEUGEOT 208</h3>
                <p class="car-category">CITADINE</p>
                <p class="car-price">45 € / jour</p>
                <a href="#" class="car-btn">Voir plus</a>
            </div>

            <!-- CARD 3 -->
            <div class="car-card">
                <img src="/assets/img/leapmotor.jpg" alt="Leapmotor T03">
                <h3>LEAPMOTOR T03</h3>
                <p class="car-category">CITADINE</p>
                <p class="car-price">39 € / jour</p>
                <a href="#" class="car-btn">Voir plus</a>
            </div>

        </div>

    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <p>Politique de confidentialité - Conditions générales d’utilisation</p>
        <p>© 2026 EHM. Tous droits réservés.</p>
    </footer>

</body>

</html>