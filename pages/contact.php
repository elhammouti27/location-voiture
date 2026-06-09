<?php include 'header.php'; ?>

<h1>Contact</h1>

<p>Email : contact@ehn.com</p>
<p>Téléphone : 06 00 00 00 00</p>

<form action="traitement_contact.php" method="POST">
    <label>Votre email</label>
    <input type="email" name="email" required>

    <label>Message</label>
    <textarea name="message" required></textarea>

    <button type="submit">Envoyer</button>
</form>

<?php include 'footer.php'; ?>
<footer>
    <p>© 2026 EHN - Tous droits réservés</p>
</footer>
