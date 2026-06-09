<?php
require "../Model/M_Clients.php";
session_start();

/* =========================
   LOGOUT
========================= */
if (isset($_POST["btnDaconnecte"])) {
    session_unset();
    session_destroy();
    header("location:./Login");
    exit;
}

/* =========================
   AUTH CHECK
========================= */
if (!isset($_SESSION["Admin"]))
    header("location:./Login");

/* =========================
   MODEL
========================= */
$client = new Client();
$message = "";
$class = "";

/* =========================
   ADD CLIENT
========================= */
if (isset($_POST["add"])) {

    $client->cin = $_POST["cin"];
    $client->firstname = $_POST["firstname"];
    $client->lastname = $_POST["lastname"];
    $client->phone_number = $_POST["phone_number"];
    $client->email = $_POST["email"];
    $client->password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $client->permis = $_POST["permis"];

    $n = $client->Add();

    if ($n !== false) {
        $message = "Ajouté avec succès";
        $class = "alert alert-success";
    } else {
        $message = "Client déjà existant (email ou CIN)";
        $class = "alert alert-danger";
    }
}

/* =========================
   UPDATE CLIENT
========================= */
if (isset($_POST["update"])) {

    $client->id_client = $_POST["id_client"];
    $client->cin = $_POST["cin"];
    $client->firstname = $_POST["firstname"];
    $client->lastname = $_POST["lastname"];
    $client->phone_number = $_POST["phone_number"];
    $client->email = $_POST["email"];
    $client->permis = $_POST["permis"];

    $n = $client->Update();

    if ($n !== false) {
        $message = "Modifié avec succès";
        $class = "alert alert-success";
    } else {
        $message = "Erreur de modification";
        $class = "alert alert-danger";
    }
}

/* =========================
   DELETE CLIENT
========================= */
if (isset($_POST["delete"])) {

    $client->id_client = $_POST["id_client_delete"];

    $n = $client->Delete();

    if ($n !== false) {
        $message = "Supprimé avec succès";
        $class = "alert alert-success";
    } else {
        $message = "Impossible de supprimer (réservation existante)";
        $class = "alert alert-danger";
    }
}

/* =========================
   SEARCH / LIST
========================= */
if (isset($_GET['info'])) {

    $info = $_GET['info'];

    if ($info == "") {
        $Clients = $client->GetAll();
    } else {
        $Clients = $client->Find($info);
    }

    foreach ($Clients as $cl) {

        echo "<tr onclick='get(this)'>
                <td>{$cl['id_client']}</td>
                <td>{$cl['cin']}</td>
                <td>{$cl['firstname']}</td>
                <td>{$cl['lastname']}</td>
                <td>{$cl['phone_number']}</td>
                <td>{$cl['email']}</td>
                <td>{$cl['permis']}</td>

                <td><a href='#editClient' style='color:blue' data-toggle='modal'>
                    <i class='fa fa-edit'></i></a></td>

                <td><a href='#deleteClient' style='color:red' data-toggle='modal'>
                    <i class='fa fa-trash'></i></a></td>
              </tr>";
    }

} else {
    $Clients = $client->GetAll();
    require "../View/V_Clients.php";
}
?>