<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EHN - Accueil</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header class="header">
        <img src="/assets/img/EHN-logo.png" alt="Logo EHM" class="logo-right">
        <div class="auth">
            <a href="/pages/connexion.php" class="btn-primary">Connexion</a>
            <a href="/pages/inscription.php" class="btn-primary">S’inscrire</a>

            
        </div>
    </header>
    <nav class="navbar-expand">
        <ul id="nav-links">
            <li><a href="index.php" class="active">Accueil</a></li>
            <li><a href="/pages/propos.php">À Propos</a></li>
            <li><a href="/pages/reservation.php">Réservation</a></li>
            <li><a href="/pages/contact.php">Contact</a></li>
        </ul>
    </nav>
    <main>
        <section class="hero">
            <div class="hero-text">
                <h1>louez facilement le véhicule idéal.</h1>
                <p>
                    notre site vous propose une sélection de voitures fiables, modernes et adaptées à tous vos besoins.<br>
                    réservez en quelques clics.
                </p>
            </div>

            <div class="hero-image">
                <img src="assets/img/cle-voiture.jpg" alt="Clé de voiture">
            </div>
        </section>
        <section class="vehicules">
            <h2>Nos véhicules</h2>

            <div class="cards">
                <article class="card">
                    <img src="assets/img/voiture1.jpg" alt="Bugatti Hypercar">
                    <h3>BUGATTI HYPERCAR</h3>
                    <p class="prix">4500 euros/jour</p>
                    <a href="#" class="btn-secondary">voir plus</a>
                </article>

                <article class="card">
                    <img src="assets/img/voiture2.jpg" alt="Peugeot 208">
                    <h3>PEUGEOT 208 CITADINE</h3>
                    <p class="prix">45 euros/jour</p>
                    <a href="#" class="btn-secondary">voir plus</a>
                </article>

                <article class="card">
                    <img src="assets/img/voiture3.jpg" alt="Leapmotor T03">
                    <h3>LEAPMOTOR T03 CITADINE</h3>
                    <p class="prix">39 euros/jour</p>
                    <a href="#" class="btn-secondary">voir plus</a>
                </article>
            </div>
        </section>

    </main>
    <footer class="footer">
        <p>Politique de confidentialité - Conditions générales d’utilisation</p>
        <p>© 2026 EHN. Tous droits réservés.</p>
    </footer>

</body>

</html>