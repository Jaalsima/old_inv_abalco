<?php
include("../includes/db.php");

if ($_SESSION['rol'] == 1) {

    if (isset($_GET['id'])) { //Propiedad 'id' que se obtiene por medio del método 'GET'
        $id = $_GET['id'];
        $query = "SELECT * FROM proveedor WHERE id_prov = '$id'";
        $resultado = mysqli_query($conexion, $query);

        if (mysqli_num_rows($resultado) == 1) {
            $fila = mysqli_fetch_array($resultado);
            $id = $fila['id_prov'];
            $nombre = $fila['nombre_prov'];
            $marca = $fila['dir_prov'];
            $unimedida = $fila['tel_prov'];
            $cantidad = $fila['email_prov'];
        }
    }

    if (isset($_POST['actualizar'])) {
        $id_old = $_GET["id"];
        $id_new = $_POST["id_prov"];
        $nombre = $_POST["nombre_prov"];
        $direccion = $_POST["dir_prov"];
        $telefono = $_POST["tel_prov"];
        $email = $_POST["email_prov"];

        $query = "UPDATE proveedor SET id_prov = '$id_new', nombre_prov = '$nombre', dir_prov = '$direccion', tel_prov = '$telefono', email_prov = '$email' WHERE id_prov = '$id_old'";
        $resultado = mysqli_query($conexion, $query);
        if (!$resultado) {
            die("¡No se ha podido actualizar el proveedor!");
        }
        $_SESSION["mensaje"] = "¡Los datos de este proveedor han sido actualizados exitosamene!";
        $_SESSION["tipo_de_mensaje"] = "primary";
        header("Location: proveedor.php");
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
            <li class="nav-item active">
                <a class="nav-link" href="../proveedor/proveedor.php">PROVEEDORES<span class="sr-only">(current)</span></a>
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
    <h4 style="text-align: center;">INFORMACIÓN DE PROVEEDOR</h4>
    <div class="row">

        <div class="col-md-4 mx-auto">
            <div class="card card-body bg-info">
                <form action="editar_proveedor.php?id=<?php echo $_GET['id']; ?>" method="POST"> <?php //Aqui estoy capturando el id de los productos 
                                                                                                    ?>
                    <div class="form-group">
                        <input type="text" name="id_prov" value="<?php echo $id; ?>" class="form-control" placeholder="Código Proveedor" required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="nombre_prov" value="<?php echo $nombre; ?>" class="form-control" placeholder="Nombre Proveedor">
                    </div>

                    <div class="form-group">
                        <input type="text" name="dir_prov" value="<?php echo $marca; ?>" class="form-control" placeholder="Dirección Proveedor">
                    </div>

                    <div class="form-group">
                        <input type="text" name="tel_prov" value="<?php echo $unimedida; ?>" class="form-control" placeholder="Teléfono Proveedor">
                    </div>

                    <div class="form-group">
                        <input type="email" name="email_prov" value="<?php echo $cantidad; ?>" class="form-control" placeholder="Email Proveedor">
                    </div>

                    <button class="btn btn-secondary btn-block" name="actualizar">
                        Actualizar Proveedor
                    </button>
            </div>
        </div>
    </div>

</div>

<?php include('../includes/footer.php'); ?>