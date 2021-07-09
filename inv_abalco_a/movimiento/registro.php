<?php
include("../includes/db.php");
include("../includes/header.php");
?>

<!--Barra de navegación-->
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
                <a class="nav-link" href="..//movimiento/compra.php">COMPRAS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../movimiento/venta.php">VENTAS</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../movimiento/registro.php">REGISTRO<span class="sr-only">(current)</span></a>
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

<!--Contenedor general-->
<div class="container-fluid p-4 jumbotron" style="margin-top: 50px;">

    <!--Tabla para registro de movimientos-->
    <div class="row">
        <h4 class="mx-auto" style="color: gray;">REGISTRO DE MOVIMIENTOS</h4>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-10 bg-secondary card card-body mx-auto">
            <div>
                <table class="table table-bordered table-hover table-secondary">
                    <thead>

                        <tr class="bg-info" style="text-align: center; color: white; font-size:small;">
                            <th>No Movimiento</th>
                            <th>Código Producto</th>
                            <th>Código Compra</th>
                            <th>Código Venta</th>
                            <th>Cantidad Comprada</th>
                            <th>Cantidad Vendida</th>
                            <th>Fecha Movimiento</th>
                            <th>Responsable</th>


                        </tr>
                    </thead>

                    <tbody style="text-align: center;">

                        <?php

                        $query = "SELECT id_movimiento, fk_id_prod, fk_id_compra, fk_id_venta, cantidad_comprada, cantidad_vendida, fecha_movimiento, responsable FROM movimiento";
                        $resultado = mysqli_query($conexion, $query);

                        while ($fila = mysqli_fetch_array($resultado)) { ?>

                            <tr>
                                <td><?php echo $fila["id_movimiento"] ?></td>
                                <td><?php echo $fila["fk_id_prod"] ?></td>
                                <td><?php echo $fila["fk_id_compra"] ?></td>
                                <td><?php echo $fila["fk_id_venta"] ?></td>
                                <td><?php echo $fila["cantidad_comprada"] ?></td>
                                <td><?php echo $fila["cantidad_vendida"] ?></td>
                                <td><?php echo $fila["fecha_movimiento"] ?></td>
                                <td><?php echo $fila["responsable"] ?></td>
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