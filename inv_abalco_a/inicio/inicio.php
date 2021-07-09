<?php
include("../includes/db.php");
include("../includes/header.php");
?>

<div class="jumbotron">

    <h1 class="display-4">SISTEMA DE INVENTARIO ABALCO S.A. 2021</h1>
    <p class="lead">Este es el sistema de información para la gestión del inventario de la empresa "ABARROTES LOS COSTES."</p>
    <hr class="my-4">
    <p>Dé clic para ingresar al sistema</p>
    <p class="lead">

        <?php
        if (isset($_SESSION['rol']) && ($_SESSION['rol'] == 1)) { ?>
            <a class="btn btn-info btn-md" href="login.php" role="button">Ingresar </a>
            <a class="btn btn-info btn-md" href="registro.php" role="button">Registrar usuario</a>
        <?php } else { ?>
            <a class="btn btn-info btn-md" href="login.php" role="button">Ingresar </a>
        <?php } ?>
</div>

<?php
include("../includes/footer.php");
?>