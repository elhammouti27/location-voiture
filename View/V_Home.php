<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["Admin"])) {
    header("Location: Login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cars EHM | Dashboard</title>

    <link rel="stylesheet" href="../Style/bootstrap.min.css">
    <link rel="stylesheet" href="../Style/All.css">
    <link rel="stylesheet" href="../Style/fontawesome-free-6.3.0-web/css/all.css">
    <script src="../Style/jquery.min.js"></script>
    <script src="../Style/assets/js/chart.min.js"></script>

    <style>
        body { background:#e6dfdf; }

        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .card-block {
            padding: 25px;
            color: white;
        }

        .bg-blue { background:#4099ff; }
        .bg-yellow { background:#FFB64D; }
        .bg-pink { background:#FF5370; }
    </style>
</head>

<body>

<?php include("header.php"); ?>
<?php include("SideBarMenu.php"); ?>

<div class="container mt-4">

    <h2>
        Dashboard |
        <?php
            $hour = date("H");
            echo ($hour < 18 ? "Bonjour " : "Bonsoir ");
            echo $_SESSION["Admin"]["username"];
        ?>
    </h2>

    <div class="row mt-4">

        <div class="col-md-4">
            <div class="card bg-blue">
                <div class="card-block">
                    <h5>Total voitures</h5>
                    <h2><?= $nbCars ?? 0 ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-yellow">
                <div class="card-block">
                    <h5>Réservations</h5>
                    <h2><?= $nbReservation ?? 0 ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-pink">
                <div class="card-block">
                    <h5>Clients</h5>
                    <h2><?= $nbClient ?? 0 ?></h2>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-4">
        <canvas id="myChart"></canvas>
    </div>

</div>

<script>
    var data = <?= json_encode($data ?? []) ?>;

    var ctx = document.getElementById('myChart').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data.map(d => d.Model),
            datasets: [{
                label: 'Revenus par Model',
                data: data.map(d => d.earnings),
                backgroundColor: 'rgba(54, 162, 235, 0.5)'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>

</body>
</html>