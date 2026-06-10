<?php
session_start();
require_once "../../db.php";

if (!isset($_SESSION["user"])) {
    header("Location: /pages/connexion.php");
    exit;
}

// On récupère l'ID correct
$id_client = $_SESSION["user"]["id_client"];

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$phone_number = $_POST["phone_number"];
$permis = $_POST["permis"];

$req = $pdo->prepare("
    UPDATE clients 
    SET firstname = ?, lastname = ?, phone_number = ?, permis = ?
    WHERE id_client = ?
");

$req->execute([$firstname, $lastname, $phone_number, $permis, $id_client]);

// Mise à jour de la session
$_SESSION["user"]["firstname"] = $firstname;
$_SESSION["user"]["lastname"] = $lastname;
$_SESSION["user"]["phone_number"] = $phone_number;
$_SESSION["user"]["permis"] = $permis;

// Retour au profil
header("Location: /pages/profil.php");
exit;
