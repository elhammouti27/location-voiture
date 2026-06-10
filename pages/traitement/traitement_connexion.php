<?php
session_start();
require_once "../../db.php";

// Vérifie que le formulaire a bien envoyé les données
if (!isset($_POST["email"]) || !isset($_POST["password"])) {
    die("Formulaire non envoyé.");
}

$email = $_POST["email"];
$password = $_POST["password"];

// On récupère le client via son email
$req = $pdo->prepare("SELECT * FROM clients WHERE email = ?");
$req->execute([$email]);
$user = $req->fetch();

// Si aucun utilisateur trouvé
if (!$user) {
    die("Email incorrect.");
}

// Vérification du mot de passe
if (!password_verify($password, $user["password"])) {
    die("Mot de passe incorrect.");
}

// Connexion OK → création de la session
$_SESSION["user"] = $user;

// Redirection vers l'accueil
header("Location: /index.php");
exit;
