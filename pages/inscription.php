<?php include 'header.php'; ?>

<h1>Inscription</h1>

<form action="traitement_inscription.php" method="POST">
    <label>Nom</label>
    <input type="text" name="nom" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Mot de passe</label>
    <input type="password" name="password" required>

    <label>Confirmer le mot de passe</label>
    <input type="password" name="password_confirm" required>

    <button type="submit">S'inscrire</button>
</form>

<?php include 'footer.php'; ?>
<footer>
    <p>© 2026 EHN - Tous droits réservés</p>
</footer>
