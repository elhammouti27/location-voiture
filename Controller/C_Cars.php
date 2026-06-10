<?php

require "../Model/M_Cars.php";
session_start();

if (!isset($_SESSION["Admin"])) {
    header("location:./Login");
    exit();
}

$Cars = new Cars();

$messege = "";
$class = "";

// ADD
if (isset($_POST["add"])) {

    $Cars->registration_number = $_POST["Matricule"];
    $Cars->brand = $_POST["Marque"];
    $Cars->model = $_POST["model"];
    $Cars->notes = $_POST["observation"];
    $Cars->id_categorie = $_POST["Type"] ?? null;

    if ($Cars->id_categorie) {
        if ($Cars->Add()) {
            $messege = "Ajouté avec succès";
            $class = "alert alert-success";
        } else {
            $messege = "Erreur ajout voiture";
            $class = "alert alert-danger";
        }
    } else {
        $messege = "Choisissez un type";
        $class = "alert alert-warning";
    }
}

// UPDATE
if (isset($_POST["update"])) {

    $Cars->registration_number = $_POST["Matricule"];
    $Cars->brand = $_POST["Marque"];
    $Cars->model = $_POST["model"];
    $Cars->notes = $_POST["observation"];
    $Cars->id_categorie = $_POST["Type"];
    $Cars->id_car = $_POST["OldMatricule"];

    if ($Cars->Update()) {
        $messege = "Modifié avec succès";
        $class = "alert alert-success";
    } else {
        $messege = "Erreur modification";
        $class = "alert alert-danger";
    }
}

// DELETE
if (isset($_POST["delete"])) {

    $Cars->id_car = $_POST["Matriculedelete"];

    if ($Cars->Delete()) {
        $messege = "Supprimé avec succès";
        $class = "alert alert-success";
    } else {
        $messege = "Erreur suppression";
        $class = "alert alert-danger";
    }
}

// LIST
if (isset($_GET['info'])) {
    $Cars = $_GET['info'] == "" ? $Cars->GetAll() : $Cars->Find($_GET['info']);
} else {
    $Cars = $Cars->GetAll();
}

require "../View/V_Cars.php";