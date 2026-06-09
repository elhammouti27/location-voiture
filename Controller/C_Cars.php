<?php
require "../Model/M_Cars.php";
session_start();

if (!isset($_SESSION["Admin"])) {
    header("location:./Login");
    exit;
}

$car = new Cars();
$message = "";
$class = "";

/* =========================
   ADD
========================= */
if (isset($_POST["add"])) {

    $car->registration_number = $_POST["registration_number"];
    $car->brand = $_POST["brand"];
    $car->model = $_POST["model"];
    $car->price = $_POST["price"];
    $car->notes = $_POST["notes"];
    $car->id_categorie = $_POST["id_categorie"];

    if ($car->Add()) {
        $message = "Ajouté avec succès";
        $class = "alert alert-success";
    } else {
        $message = "Erreur ajout";
        $class = "alert alert-danger";
    }
}

/* =========================
   DELETE
========================= */
if (isset($_POST["delete"])) {

    $car->id_car = $_POST["id_car"];

    if ($car->Delete()) {
        $message = "Supprimé avec succès";
        $class = "alert alert-success";
    } else {
        $message = "Erreur suppression";
        $class = "alert alert-danger";
    }
}

/* =========================
   AJAX SEARCH
========================= */
if (isset($_GET["info"])) {

    $info = $_GET["info"];

    $data = ($info == "")
        ? $car->GetAll()
        : $car->GetAll(); // simple (pas de Find dans ta DB actuelle)

    foreach ($data as $cr) {

        echo "<tr onclick='get(this)'>
                <td>{$cr['id_car']}</td>
                <td>{$cr['registration_number']}</td>
                <td>{$cr['brand']}</td>
                <td>{$cr['model']}</td>
                <td>{$cr['price']}</td>
                <td>{$cr['notes']}</td>
                <td>{$cr['nom_categorie']}</td>

                <td><a href='#deleteCar' data-toggle='modal' style='color:red'>🗑</a></td>
              </tr>";
    }
    exit;
}

/* =========================
   VIEW
========================= */
$Cars = $car->GetAll();
require "../View/V_Cars.php";
?>