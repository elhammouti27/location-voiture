<?php
require_once "../../db.php";

// Vérifier que les champs existent
$id_car = $_POST['id_car'] ?? null;
$start = $_POST['start_date'] ?? null;
$end = $_POST['end_date'] ?? null;

if (!$id_car || !$start || !$end) {
    die("Erreur : données manquantes.");
}

// Insertion
$req = $pdo->prepare("
    INSERT INTO reservation (id_car, start_date, end_date, status, id_client)
    VALUES (?, ?, ?, 'en_attente', 1)
");

$req->execute([$id_car, $start, $end]);

// REDIRECTION VERS confirmation.php
header("Location: ../confirmation.php");
exit;
