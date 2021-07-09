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
            <a href="../inicio/INICIO.php" class="navbar-brand">
                <i class="fab fa-asymmetrik"> </i> SISTEMA DE CONTROL DE INVENTARIO ABALCO S.A. 2021</a>
        </div>

        <?php
        if (isset($_SESSION['id'])) { ?>

            <div class="dropdown">
                <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <h6 class="dropdown-header"><?php if ($_SESSION['rol'] == 1) {
                                                    echo "Administrador";
                                                } else {
                                                    echo "Vendedor";
                                                } ?>
                    </h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"> <?php echo $_SESSION['nombre'] . " " ?></a>
                    <a class="dropdown-item" href="../inicio/salida.php">Cerrar Sesión</a>
                </div>
            </div>

        <?php } ?>

    </nav>

    <nav class="navbar navbar-dark bg-secondary">

    </nav>