<?php
if (!isset($Cars)) $Cars = [];
if (!isset($message)) $message = "";
if (!isset($class)) $class = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>NadorCars | Voitures</title>

<link rel="stylesheet" href="../Style/bootstrap.min.css">
<link rel="stylesheet" href="../Style/All.css">
<link rel="stylesheet" href="../Style/fontawesome-free-6.3.0-web/css/all.css">

<script src="../Style/jquery.min.js"></script>
<script src="../Style/bootstrap.min.js"></script>
<script src="../js/Cars.js"></script>

<style>
table.table tr th, table.table tr td {
    padding: 7px;
    text-align: center;
}
</style>
</head>

<body>

<?php include("header.php"); ?>
<?php include("SideBarMenu.php"); ?>

<div class="container-fluid">

<div class="row">

<div class="col-md-12">

<div class="table-wrapper">

<!-- TITLE (CLIENT STYLE) -->
<div class="table-title">
    <div class="row">

        <div class="col-sm-5">
            <h2>Gestion <b>Voitures</b></h2>
        </div>

        <div class="col-sm-3">
            <input type="text"
                   class="form-control"
                   placeholder="Recherche..."
                   onkeyup="Recherche(this)">
        </div>

        <div class="col-sm-4 text-end">
            <a href="#addCar" class="btn btn-success" data-toggle="modal">
                <i class="fa fa-plus"></i> Nouvelle Voiture
            </a>
        </div>

    </div>
</div>

<!-- TABLE -->
<table class="table table-striped table-hover table-bordered">

<thead>
<tr>
    <th>ID</th>
    <th>Matricule</th>
    <th>Marque</th>
    <th>Model</th>
    <th>Prix</th>
    <th>Notes</th>
    <th>Categorie</th>
    <th colspan="2">Action</th>
</tr>
</thead>

<tbody id="infomations">

<?php if (!empty($Cars)) : ?>
<?php foreach ($Cars as $cr) : ?>

<tr onclick="get(this)">

    <td><?= $cr['id_car'] ?></td>
    <td><?= $cr['registration_number'] ?></td>
    <td><?= $cr['brand'] ?></td>
    <td><?= $cr['model'] ?></td>
    <td><?= $cr['price'] ?></td>
    <td><?= $cr['notes'] ?></td>
    <td><?= $cr['nom_categorie'] ?></td>

    <td>
        <a href="#editCar" data-toggle="modal" style="color:blue">
            <i class="fa fa-edit"></i>
        </a>
    </td>

    <td>
        <a href="#deleteCar" data-toggle="modal" style="color:red">
            <i class="fa fa-trash"></i>
        </a>
    </td>

</tr>

<?php endforeach; ?>
<?php endif; ?>

</tbody>

</table>

</div>

</div>
</div>
</div>

<!-- MESSAGE -->
<div class="<?= $class ?>" id="message">
    <?= $message ?>
</div>

</body>
</html>