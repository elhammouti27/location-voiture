<?php include 'header.php'; ?>

<h1>Connexion</h1>

<form action="traitement_connexion.php" method="POST">
    <label>Email</label>
    <input type="email" name="email" required>

    <label>Mot de passe</label>
    <input type="password" name="password" required>

    <button type="submit">Se connecter</button>
</form>

<p>Pas de compte ? <a href="inscription.php">Créer un compte</a></p>

<?php include 'footer.php'; ?>
<footer>
    <p>© 2026 EHN - Tous droits réservés</p>
</footer>
