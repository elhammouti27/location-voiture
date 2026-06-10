<?php
session_start();
require_once "../../db.php"; // connexion OK

// Vérifie que le formulaire a bien envoyé les données
if (!isset($_POST["firstname"])) {
    die("Formulaire non envoyé.");
}

// Récupération des données du formulaire
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$cin = $_POST["cin"];
$phone_number = $_POST["phone_number"];
$email = $_POST["email"];
$permis = $_POST["permis"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

// INSERT dans la table clients (avec S)
$req = $pdo->prepare("
    INSERT INTO clients (firstname, lastname, cin, phone_number, email, password, permis)
    VALUES (?, ?, ?, ?, ?, ?, ?)
");

$req->execute([$firstname, $lastname, $cin, $phone_number, $email, $password, $permis]);

// Récupération du client pour la session
$req2 = $pdo->prepare("SELECT * FROM clients WHERE email = ?");
$req2->execute([$email]);
$user = $req2->fetch();

// Création de la session
$_SESSION["user"] = $user;

// Redirection
header("Location: /index.php");
exit;
