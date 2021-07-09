<?php
include("../includes/db.php");

if ($_SESSION['rol'] == 1) {

    if (isset($_GET['id'])) { //Propiedad 'id' que se obtiene por medio del método 'GET'
        $id = $_GET['id'];
        $query = "SELECT * FROM producto WHERE id_prod = '$id'";
        $resultado = mysqli_query($conexion, $query);

        if (mysqli_num_rows($resultado) == 1) {
            $fila = mysqli_fetch_array($resultado);
            $id = $fila['id_prod'];
            $nombre = $fila['nombre_prod'];
            $marca = $fila['marca_prod'];
            $unimedida = $fila['unidad_medida'];
            $cantidad = $fila['cantidad'];
            $precio = $fila['precio'];
        }
    }

    if (isset($_POST['actualizar'])) {
        $id_old = $_GET["id"];
        $id_new = $_POST["id"];
        $nombre = $_POST["nombre"];
        $marca = $_POST["marca"];
        $unimedida = $_POST["unimedida"];
        $cantidad = $_POST["cantidad"];
        $precio = $_POST["precio"];

        $query = "UPDATE producto SET id_prod = '$id_new', nombre_prod = '$nombre', marca_prod = '$marca', unidad_medida = '$unimedida', cantidad = '$cantidad', precio = '$precio' WHERE id_prod = '$id_old'";
        $resultado = mysqli_query($conexion, $query);
        if (!$resultado) {
            die("¡No se ha podido actualizar el producto!");
        }
        $_SESSION["mensaje"] = "¡Los datos de este producto han sido actualizados exitosamene!";
        $_SESSION["tipo_de_mensaje"] = "primary";
        header("Location: producto.php");
    }
} else {
?>
    <a href="../inicio/error_2.php"></a>
<?php
}
?>

<?php include("../includes/header.php"); ?>

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
            <li class="nav-item active">
                <a class="nav-link" href="../producto/producto.php">PRODUCTOS<span class="sr-only">(current)</span></a>
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
            <li class="nav-item">
                <a class="nav-link" href="../movimiento/inventario.php">INVENTARIO</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Búsqueda" aria-label="Search">
            <button class="btn btn-outline-light btn-secondary my-2 my-sm-0" type="submit">Buscar</button>
        </form>

    </div>

</nav>

<div class="container p-4 jumbotron" style="margin-top: 50px;">
    <h4 style="text-align: center;">INFORMACIÓN DE PRODUCTO</h4>
    <div class="row">

        <div class="col-md-4 mx-auto">
            <div class="card card-body bg-info">
                <form action="editar_producto.php?id=<?php echo $_GET['id']; ?>" method="POST"> <?php //Aqui estoy capturando el id de los productos 
                                                                                                ?>
                    <div class="form-group">
                        <input type="text" name="id" value="<?php echo $id; ?>" class="form-control" placeholder="Código Producto" required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Nombre Producto">
                    </div>

                    <div class="form-group">
                        <input type="text" name="marca" value="<?php echo $marca; ?>" class="form-control" placeholder="Marca producto">
                    </div>

                    <div class="form-group">
                        <input type="text" name="unimedida" value="<?php echo $unimedida; ?>" class="form-control" placeholder="Unidad Medida">
                    </div>

                    <div class="form-group">
                        <input type="number" min=0 step=10 name="cantidad" value="<?php echo $cantidad; ?>" class="form-control" placeholder="Cantidad">
                    </div>

                    <div class="form-group">
                        <input type="number" min=0 step=50 name="precio" value="<?php echo $precio; ?>" class="form-control" placeholder="Precio">
                    </div>

                    <button class="btn btn-secondary btn-block" name="actualizar">
                        Actualizar Producto
                    </button>
            </div>
        </div>
    </div>

</div>

<?php include('../includes/footer.php'); ?>