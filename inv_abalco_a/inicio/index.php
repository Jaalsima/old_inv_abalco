<?php
include("../includes/db.php");
include("../includes/header.php");
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <a class="navbar-brand" href="#"></a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <li class="nav-item active">
                <a class="nav-link" href="../inicio/bienvenida.php">INICIO<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../producto/producto.php">PRODUCTOS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../proveedor/proveedor.php">PROVEEDORES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../cliente/cliente.php">CLIENTES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="..//movimiento/compra.php">COMPRAS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../movimiento/venta.php">VENTAS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../movimiento/registro.php">REGISTRO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../movimiento/inventario.php">INVENTARIO</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-1" type="search" placeholder="Búsqueda" aria-label="Search">
            <button class="btn btn-sm btn-outline-light btn-secondary my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </div>

</nav>

<nav class="navbar navbar-dark bg-secondary">

</nav>

<div class="jumbotron">

    <h1 class="display-4">SISTEMA DE INVENTARIO ABALCO S.A. 2021</h1>
    <p class="lead">Este es el sistema de información para la gestión del inventario de la empresa "ABARROTES LOS COSTES."</p>
    <p class="text-primary lead">Elija la operación a realizar, accediendo a las opciones que le brinda el menú en la parte superior.</p>
    <hr class="my-4">

    <?php
    if (isset($_SESSION['id'])) {
        if ($_SESSION['rol'] == 1) {
            $rol = "Administrador";
        } else {
            $rol = "Vendedor";
        } ?>
        <div class="text-success">
            <?php
            echo ($rol . " " . $_SESSION['nombre'] . " " . $_SESSION['apellido'] . "!");
            ?>
        </div>
    <?php } ?>

</div>

<?php
include("../includes/footer.php");
?>