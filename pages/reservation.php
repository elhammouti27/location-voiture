<?php 
include 'header.php'; 
if(!isset($_SESSION['user'])) {
    header("Location: connexion.php");
    exit;
}
?>

<h1>Réserver un véhicule</h1>

<form action="traitement_reservation.php" method="POST">
    <label>Date de début</label>
    <input type="date" name="date_debut" required>

    <label>Date de fin</label>
    <input type="date" name="date_fin" required>

    <label>Message (optionnel)</label>
    <textarea name="message"></textarea>

    <button type="submit">Envoyer la réservation</button>
</form>

<?php include 'footer.php'; ?>
<footer>
    <p>© 2026 EHN - Tous droits réservés</p>
</footer>
