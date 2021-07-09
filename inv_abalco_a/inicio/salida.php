<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA DE CONTROL DE INVENTARIO ABALCO S.A.</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css.map">
    <link rel="stylesheet" href="../css/bootstrap-grid.min.css.map">
    <link rel="stylesheet" href="../css/bootstrap-reboot.min.css.map">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">

</head>

<body>

    <nav class="navbar navbar-dark bg-info">

        <div class="container">
            <a href="../inicio/inicio.php" class="navbar-brand">
                <i class="fab fa-asymmetrik"> </i> SISTEMA DE CONTROL DE INVENTARIO ABALCO S.A. 2021</a>
        </div>

    </nav>

    <nav class="navbar navbar-dark bg-secondary">

    </nav>
    <br>
    <h3 class="lead">¡Sesión Finalizada!</h3>
    <hr>
    <a href="../inicio/inicio.php" class="text-primary">¿Iniciar sesión de nuevo?</a>
    </div>

    <?php
    include("../includes/footer.php");
    ?>