<?php
session_start();
require_once "../db.php";

// Si l'utilisateur n'est pas connecté → redirection
if (!isset($_SESSION["user"])) {
    header("Location: /pages/connexion.php");
    exit;
}

// Si id_car existe → on affiche le formulaire
if (isset($_GET["id_car"])) {

    $id_car = $_GET["id_car"];
?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <title>Réserver un véhicule</title>
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>

    <body>

        <h2>Réserver ce véhicule</h2>

        <form action="traitement/traitement_reservation.php" method="POST">


            <input type="hidden" name="id_car" value="<?= $_GET['id_car'] ?>">

            <label>Date de début :</label>
            <input type="date" name="start_date" required><br><br>

            <label>Date de fin :</label>
            <input type="date" name="end_date" required><br><br>

            <button type="submit">Valider la réservation</button>
        </form>

    </body>

    </html>

<?php
    exit; // IMPORTANT : on arrête ici
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Réservation - EHM</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>

    <header class="header">
        <img src="/assets/img/EHN-logo.png" alt="Logo EHM" class="logo-right">

        <div class="auth">
            <?php if (isset($_SESSION["user"])): ?>
                <a href="/pages/profil.php">
                    <img src="/assets/img/profil.jpg" alt="Profil" style="width:35px; height:35px; border-radius:50%;">
                </a>
            <?php else: ?>
                <a href="/pages/inscription.php" class="btn-primary">Inscription</a>
                <a href="/pages/connexion.php" class="btn-primary">Connexion</a>
            <?php endif; ?>
        </div>
    </header>

    <nav class="navbar-expand">
        <ul id="nav-links">
            <li><a href="/index.php">Accueil</a></li>
            <li><a href="/pages/propos.php">À Propos</a></li>
            <li><a href="/pages/reservation.php" class="active">Réservation</a></li>
            <li><a href="/pages/contact.php">Contact</a></li>
        </ul>
    </nav>

    <main class="reservation-container">

        <h1 class="reservation-title">Réserver un véhicule</h1>

        <?php
        // Récupérer les voitures
        $req = $pdo->query("SELECT * FROM cars");
        $cars = $req->fetchAll();
        ?>

        <?php if (count($cars) === 0): ?>
            <p>Aucun véhicule disponible pour le moment.</p>
        <?php else: ?>

            <div class="cars-grid">

                <?php foreach ($cars as $car): ?>
                    <div class="car-card">
                        <img src="/assets/img/default_car.jpg" alt="<?= $car['brand'] . ' ' . $car['model'] ?>">
                        <h3><?= $car['brand'] ?></h3>
                        <p class="car-price"><?= $car['price'] ?> € / jour</p>

                        <a href="/pages/reservation.php?id_car=<?= $car['id_car'] ?>" class="car-btn">
                            Réserver
                        </a>
                    </div>
                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </main>

    <footer class="footer">
        <p>© 2026 EHM. Tous droits réservés.</p>
    </footer>

</body>

</html>