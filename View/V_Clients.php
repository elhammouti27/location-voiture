<?php
if (!isset($Clients)) $Clients = [];
if (!isset($message)) $message = "";
if (!isset($class)) $class = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>NadorCars | Client</title>

<link rel="stylesheet" href="../Style/bootstrap.min.css">
<link rel="stylesheet" href="../Style/All.css">
<link rel="stylesheet" href="../Style/fontawesome-free-6.3.0-web/css/all.css">

<script src="../Style/jquery.min.js"></script>
<script src="../Style/bootstrap.min.js"></script>

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

<!-- TITLE -->
<div class="table-title">
    <div class="row">

        <div class="col-sm-5">
            <h2>Gestion <b>Clients</b></h2>
        </div>

        <div class="col-sm-3">
            <input type="text"
                   class="form-control"
                   placeholder="Recherche..."
                   onkeyup="Recherche(this)">
        </div>

        <div class="col-sm-4 text-end">
            <a href="#addClient" class="btn btn-success" data-toggle="modal">
                <i class="fa fa-plus"></i> Nouveau Client
            </a>
        </div>

    </div>
</div>

<!-- TABLE -->
<table class="table table-striped table-hover table-bordered">

<thead>
<tr>
    <th>CIN</th>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Téléphone</th>
    <th>Email</th>
    <th>Permis</th>
    <th colspan="2">Action</th>
</tr>
</thead>

<tbody id="infomations">

<?php if (!empty($Clients)) : ?>
<?php foreach ($Clients as $cl) : ?>

<tr onclick="get(this)">

    <td><?= $cl['cin'] ?></td>
    <td><?= $cl['firstname'] ?></td>
    <td><?= $cl['lastname'] ?></td>
    <td><?= $cl['phone_number'] ?></td>
    <td><?= $cl['email'] ?></td>
    <td><?= $cl['permis'] ?></td>

    <td>
        <a href="#editClient" data-toggle="modal" style="color:blue">
            <i class="fa fa-edit"></i>
        </a>
    </td>

    <td>
        <a href="#deleteClient" data-toggle="modal" style="color:red">
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