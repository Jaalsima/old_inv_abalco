<?php
include("../includes/db.php");

if ($_SESSION['rol'] == 1) {
    if (isset($_POST["guardar"])) {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $marca = $_POST["marca"];
        $unimedida = $_POST["unimedida"];
        $cantidad = $_POST["cantidad"];
        $precio = $_POST["precio"];
    }

    $query = "INSERT INTO producto(id_prod, nombre_prod, marca_prod, unidad_medida, cantidad, precio) VALUES ('$id', '$nombre', '$marca', '$unimedida', '$cantidad', '$precio')";
    $resultado = mysqli_query($conexion, $query);
    if (!$resultado) {
        die("¡No se ha podido guardar el producto!");
    }

    $_SESSION["mensaje"] = "¡Producto Guardado Exitosamente!";
    $_SESSION["tipo_de_mensaje"] = "success";
    header("location: producto.php");  //Esta instrucción se utiliza para redireccionar//
} else {
?>
    <a href="../inicio/error_2.php"></a>
<?php
}
