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
                <a class="nav-link" href="../producto/producto.php">PRODUCTOS </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../proveedor/proveedor.php">PROVEEDORES</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../cliente/cliente.php">CLIENTES<span class="sr-only">(current)</span></a>
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

<div class="container-fluid p-4 jumbotron" style="margin-top: 50px;">

    <div class="row">

        <div class="col-md-4">

            <?php if (isset($_SESSION["mensaje"])) { ?>
                <div class="alert alert-<?= $_SESSION["tipo_de_mensaje"] ?> alert-dismissible fade show" role="alert">

                    <?= $_SESSION["mensaje"] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            } ?>

            <div class="card card-body bg-info">


                <form action="guardar_cliente.php" method="POST">

                    <div class="form-group">
                        <input type="text" name="id_cliente" class="form-control" placeholder="Documento de Identidad">
                    </div>

                    <div class="form-group">
                        <input type="text" name="nombre_cliente" class="form-control" placeholder="Nombre Cliente">
                    </div>

                    <div class="form-group">
                        <input type="text" name="dir_cliente" class="form-control" placeholder="Dirección Cliente">
                    </div>

                    <div class="form-group">
                        <input type="tel" name="tel_cliente" class="form-control" placeholder="Teléfono Cliente">
                    </div>

                    <div class="form-group">
                        <input type="email" name="email_cliente" class="form-control" placeholder="Email Cliente">
                    </div>


                    <input type="submit" class="btn btn-outline-light btn-secondary btn-block" name="guardar" value="Guardar Cliente">


                </form>
            </div>
        </div>

        <div class="col-md-8 bg-secondary card card-body">
            <h4 style="text-align: center; color: white;">CLIENTES</h4>

            <div class="p-2">
                <table class="table table-bordered table-hover table-secondary">

                    <thead>

                        <tr class="bg-info" style="text-align: center; color: white; font-size:small;">
                            <th>Doc. Identidad</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Acción</th>


                        </tr>
                    </thead>

                    <tbody style="text-align: center;">

                        <?php

                        $query = "SELECT * FROM cliente ORDER BY nombre_cliente";
                        $resultado = mysqli_query($conexion, $query);

                        while ($fila = mysqli_fetch_array($resultado)) { ?>

                            <tr>
                                <td><?php echo $fila["id_cliente"] ?></td>
                                <td><?php echo $fila["nombre_cliente"] ?></td>
                                <td><?php echo $fila["dir_cliente"] ?></td>
                                <td><?php echo $fila["tel_cliente"] ?></td>
                                <td><?php echo $fila["email_cliente"] ?></td>
                                <td style="text-align:center;"><a href="editar_cliente.php?id=<?php echo $fila['id_cliente'] ?>" class="btn btn-dark btn-sm" style="background-color: rgb(53, 156, 187);">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <a href="eliminar_cliente.php?id=<?php echo $fila['id_cliente'] ?>" class="btn btn-sm btn-dark" style="background-color: rgb(187, 53, 53);">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
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