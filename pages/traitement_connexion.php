<?php
session_start();
require_once "../config/db.php"; // connexion PDO

// Récupération des données
$email = $_POST["email"];
$password = $_POST["password"];

// Vérifier si l'utilisateur existe
$req = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
$req->execute([$email]);
$user = $req->fetch();

if ($user && password_verify($password, $user["password"])) {

    // Création de la session
    $_SESSION["user"] = $user;

    // Redirection vers l'accueil
    header("Location: /index.php");
    exit;

} else {

    // Erreur → retour à la connexion
    $_SESSION["error"] = "Email ou mot de passe incorrect.";
    header("Location: connexion.php");
    exit;
}
