<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>NadorCars | Voitures</title>

    <link rel="stylesheet" href="../Style/bootstrap.min.css">
    <link rel="stylesheet" href="../Style/All.css">
    <link rel="stylesheet" href="../Style/bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <script src="../Style/jquery.min.js"></script>
    <script src="../Style/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../Style/fontawesome-free-6.3.0-web/css/all.css">
    <link rel="stylesheet" href="../Style/RealoadpageAnimation.css">

    <style>
        table.table tr th,
        table.table tr td {
            text-align: center;
            vertical-align: middle;
        }
    </style>

    <script src="../js/Cars.js"></script>
</head>

<body>

<?php include("header.php"); ?>

<div class="container-fluid">
    <div class="row">

        <?php include("sidebarmenuCarExeption.php"); ?>

        <div id="preloader">
            <div id="loader"></div>
        </div>

        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 AnimationIn">

            <div class="table-responsive">
                <div class="table-wrapper">

                    <div class="table-title">
                        <div class="row">

                            <div class="col-sm-5">
                                <h2>Gestion <b>Voitures</b></h2>
                            </div>

                            <div class="col-sm-3">
                                <input type="text" class="form-control" placeholder="Recherche..." onkeyup="Recherche(this)">
                            </div>

                            <div class="col-sm-4">
                                <a href="#addVoiture" class="btn btn-success" data-toggle="modal">
                                    <i class="fa-solid fa-plus"></i> Nouvelle voiture
                                </a>
                            </div>

                        </div>
                    </div>

                    <table class="table table-striped table-hover table-bordered">

                        <thead>
                        <tr>
                            <th>Matricule</th>
                            <th>Marque</th>
                            <th>Modèle</th>
                            <th>Prix</th>
                            <th>Remarques</th>
                            <th colspan="2">Actions</th>
                        </tr>
                        </thead>

                        <tbody id="infomations">

                        <?php
                        if (!empty($Cars)) {
                            foreach ($Cars as $cr) {
                                echo "
                                <tr>
                                    <td>{$cr['registration_number']}</td>
                                    <td>{$cr['brand']}</td>
                                    <td>{$cr['model']}</td>
                                    <td>{$cr['price']}</td>
                                    <td>{$cr['notes']}</td>

                                    <td>
                                        <a href='#editCar' data-toggle='modal' style='color:blue'>
                                            <i class='fa fa-edit'></i>
                                        </a>
                                    </td>

                                    <td>
                                        <a href='#deleteCar' data-toggle='modal' style='color:red'>
                                            <i class='fa fa-trash'></i>
                                        </a>
                                    </td>
                                </tr>";
                            }
                        }
                        ?>

                        </tbody>
                    </table>

                    <div class="<?php echo $class ?? '' ?>">
                        <?php echo $messege ?? '' ?>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>