<?php
include("../includes/db.php");
include("../includes/header.php");
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <a class="navbar-brand" href="#"></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="../inicio/inicio.php">INICIO</a>
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
                <a class="nav-link" href="../movimiento/compra.php">COMPRAS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../movimiento/venta.php">VENTAS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../movimiento/registro.php">REGISTRO</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../movimiento/inventario.php">INVENTARIO<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-1" type="search" placeholder="Búsqueda" aria-label="Search">
            <button class="btn btn-sm btn-outline-light btn-secondary my-2 my-sm-0" type="submit">Buscar</button>
        </form>

    </div>

</nav>

<div class="container-fluid p-4 jumbotron" style="margin-top: 50px;">

    <h4 class="mx-auto" style="color: gray; text-align: center;">INVENTARIO</h4>

    <div class="col-md-12 bg-secondary card card-body">

        <div class="p-2">
            <table class="table table-bordered table-hover table-secondary">

                <thead>
                    <tr class="bg-info" style="text-align: center; color: white; font-size:small;">
                        <th>Código Producto</th>
                        <th>Nombre Producto</th>
                        <th>Marca Producto</th>
                        <th>Unidad Medida</th>
                        <th>Cantidad Total</th>
                    </tr>
                </thead>

                <tbody style="text-align: center;">

                    <?php
                    $query = "SELECT id_prod, nombre_prod, marca_prod, unidad_medida, cantidad FROM producto ORDER BY id_prod";

                    $resultado = mysqli_query($conexion, $query);

                    while ($fila = mysqli_fetch_array($resultado)) {
                    ?>

                        <tr>
                            <td><?php echo $fila["id_prod"] ?></td>
                            <td><?php echo $fila["nombre_prod"] ?></td>
                            <td><?php echo $fila["marca_prod"] ?></td>
                            <td><?php echo $fila["unidad_medida"] ?></td>
                            <td><?php echo $fila["cantidad"] ?></td>

                        </tr>

                    <?php } ?>

                </tbody>

            </table>
        </div>
    </div>
</div>
</div>

<?php
include("../includes/footer.php");
?>