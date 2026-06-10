 <?php
session_start();
require_once "../../db.php";

if (!isset($_SESSION["user"])) {
    header("Location: /pages/connexion.php");
    exit;
}

$id_client = $_SESSION["user"]["id_client"];

// Suppression du compte
$req = $pdo->prepare("DELETE FROM clients WHERE id_client = ?");
$req->execute([$id_client]);

// Détruire la session
session_destroy();

// Retour à l'accueil
header("Location: /index.php");
exit;
