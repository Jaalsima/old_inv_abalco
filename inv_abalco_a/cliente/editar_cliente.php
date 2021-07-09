<?php
include("../includes/db.php");

if ($_SESSION['rol'] == 1) {
    if (isset($_GET['id'])) { //Propiedad 'id' que se obtiene por medio del método 'GET'
        $id = $_GET['id'];
        $query = "SELECT * FROM cliente WHERE id_cliente = '$id'";
        $resultado = mysqli_query($conexion, $query);

        if (mysqli_num_rows($resultado) == 1) {
            $fila = mysqli_fetch_array($resultado);
            $id = $fila['id_cliente'];
            $nombre = $fila['nombre_cliente'];
            $marca = $fila['dir_cliente'];
            $unimedida = $fila['tel_cliente'];
            $cantidad = $fila['email_cliente'];
        }
    }

    if (isset($_POST['actualizar'])) {
        $id_old = $_GET["id"];
        $id_new = $_POST["id_cliente"];
        $nombre = $_POST["nombre_cliente"];
        $direccion = $_POST["dir_cliente"];
        $telefono = $_POST["tel_cliente"];
        $email = $_POST["email_cliente"];

        $query = "UPDATE cliente SET id_cliente = '$id_new', nombre_cliente = '$nombre', dir_cliente = '$direccion', tel_cliente = '$telefono', email_cliente = '$email' WHERE id_cliente = '$id_old'";
        $resultado = mysqli_query($conexion, $query);
        if (!$resultado) {
            die("¡No se ha podido actualizar el cliente!");
        }
        $_SESSION["mensaje"] = "¡Los datos de este cliente han sido actualizados exitosamene!";
        $_SESSION["tipo_de_mensaje"] = "primary";
        header("Location: cliente.php");
    }
} else {
    header("Location: ../inicio/error_2.php");
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
            <input class="form-control mr-sm-2" type="search" placeholder="Búsqueda" aria-label="Search">
            <button class="btn btn-outline-light btn-secondary my-2 my-sm-0" type="submit">Buscar</button>
        </form>

    </div>

</nav>

<div class="container p-4 jumbotron" style="margin-top: 50px;">
    <h4 style="text-align: center;">INFORMACIÓN DE CLIENTE</h4>
    <div class="row">

        <div class="col-md-4 mx-auto">
            <div class="card card-body bg-info">
                <form action="editar_cliente.php?id=<?php echo $_GET['id']; ?>" method="POST"> <?php //Aqui estoy capturando el id de los productos 
                                                                                                ?>
                    <div class="form-group">
                        <input type="text" name="id_cliente" value="<?php echo $id; ?>" class="form-control" placeholder="Código Cliente" required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="nombre_cliente" value="<?php echo $nombre; ?>" class="form-control" placeholder="Nombre Cliente">
                    </div>

                    <div class="form-group">
                        <input type="text" name="dir_cliente" value="<?php echo $marca; ?>" class="form-control" placeholder="Dirección Cliente">
                    </div>

                    <div class="form-group">
                        <input type="text" name="tel_cliente" value="<?php echo $unimedida; ?>" class="form-control" placeholder="Teléfono Cliente">
                    </div>

                    <div class="form-group">
                        <input type="email" name="email_cliente" value="<?php echo $cantidad; ?>" class="form-control" placeholder="Email Cliente">
                    </div>

                    <button class="btn btn-secondary btn-block" name="actualizar">
                        Actualizar Cliente
                    </button>
            </div>
        </div>
    </div>

</div>

<?php include('../includes/footer.php'); ?>