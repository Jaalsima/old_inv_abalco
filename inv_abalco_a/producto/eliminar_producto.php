<?php
include("../includes/db.php");

if ($_SESSION['rol'] == 1) {

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $query = "DELETE FROM producto WHERE id_prod = '$id'";
        $resultado = mysqli_query($conexion, $query);
        if (!$resultado) {
            die("¡El producto no ha sido eliminado!");
        }
        $_SESSION['mensaje'] = '¡Producto eliminado!';
        $_SESSION['tipo_de_mensaje'] = 'danger';
        header("Location: producto.php");
    }
} else {
?>
    <a href="../inicio/error_2.php"></a>
<?php
}
