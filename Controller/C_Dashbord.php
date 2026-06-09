<?php
session_start();

/* =========================
   LOGOUT
========================= */
if (isset($_POST["btnDaconnecte"])){
    session_unset();
    session_destroy();
    header("location:./Login");
    exit;
}

/* =========================
   AUTH CHECK
========================= */
if (!isset($_SESSION["Admin"])){
    header("location:./Login");
    exit;
}

/* =========================
   DB CONNECTION
========================= */
$conn = mysqli_connect("localhost", "root", "", "cars_ehm");

/* =========================
   TOTAL CARS
========================= */
$sqlnbCars = "SELECT COUNT(*) as countnbCars FROM cars";
$resultnbCars = mysqli_query($conn, $sqlnbCars);
$row = mysqli_fetch_assoc($resultnbCars);
$nbCars = $row['countnbCars'] ?? 0;

/* =========================
   TOTAL CLIENTS
========================= */
$sqlnbClient = "SELECT COUNT(*) as countnbClient FROM clients";
$resultnbClient = mysqli_query($conn, $sqlnbClient);
$row = mysqli_fetch_assoc($resultnbClient);
$nbClient = $row['countnbClient'] ?? 0;

/* =========================
   TOTAL RESERVATIONS
========================= */
$sqlReservation = "SELECT COUNT(*) AS countReservation FROM reservation";
$resultReservation = mysqli_query($conn, $sqlReservation);
$row = mysqli_fetch_assoc($resultReservation);
$nbReservation = $row['countReservation'] ?? 0;

/* =========================
   CARS DISPONIBLES
========================= */
$sqlVoitureDisponible = "
SELECT COUNT(*) AS VoitureDisponible
FROM cars c
LEFT JOIN reservation r ON c.id_car = r.id_car
WHERE r.id_car IS NULL
";

$resultVoitureDisponible = mysqli_query($conn, $sqlVoitureDisponible);
$row = mysqli_fetch_assoc($resultVoitureDisponible);
$nbVoitureDisponible = $row['VoitureDisponible'] ?? 0;

/* =========================
   EARNINGS PAR CAR
========================= */
$sql = "
SELECT c.model, SUM(DATEDIFF(r.end_date, r.start_date) * c.price) AS earnings
FROM reservation r
INNER JOIN cars c ON r.id_car = c.id_car
GROUP BY c.model
";

$result = mysqli_query($conn, $sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

/* =========================
   VIEW
========================= */
require "../View/V_Home.php";
?>