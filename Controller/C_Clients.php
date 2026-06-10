<?php

require "../Model/M_Clients.php";
session_start();

if (!isset($_SESSION["Admin"])) {
    header("Location: Login.php");
    exit();
}

$clientModel = new Client();

$Clients = [];
$messege = "";
$class = "";

/* ================= ADD ================= */
if (isset($_POST["add"])) {

    $ok = $clientModel->Add([
        "cin" => $_POST["cin"],
        "firstname" => $_POST["nom"],
        "lastname" => $_POST["prenom"],
        "phone_number" => $_POST["telephone"],
        "email" => $_POST["email"] ?? "",
        "password" => password_hash("123456", PASSWORD_DEFAULT),
        "permis" => $_POST["permis"]
    ]);

    if ($ok) {
        $messege = "Client ajouté avec succès";
        $class = "alert alert-success";
    } else {
        $messege = "Erreur ajout client";
        $class = "alert alert-danger";
    }
}

/* ================= UPDATE ================= */
if (isset($_POST["update"])) {

    $ok = $clientModel->Update([
        "id_client" => $_POST["id_client"],
        "cin" => $_POST["cin"],
        "firstname" => $_POST["nom"],
        "lastname" => $_POST["prenom"],
        "phone_number" => $_POST["telephone"],
        "email" => $_POST["email"] ?? "",
        "permis" => $_POST["permis"]
    ]);

    $messege = $ok ? "Client modifié" : "Erreur modification";
    $class = $ok ? "alert alert-success" : "alert alert-danger";
}

/* ================= DELETE ================= */
if (isset($_POST["delete"])) {

    $ok = $clientModel->Delete($_POST["id_client"]);

    $messege = $ok ? "Client supprimé" : "Erreur suppression";
    $class = $ok ? "alert alert-success" : "alert alert-danger";
}

/* ================= GET ALL ================= */
$Clients = $clientModel->GetAll();

require "../View/V_Clients.php";