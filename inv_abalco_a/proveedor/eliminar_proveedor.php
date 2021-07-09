<?php
include("../includes/db.php");

if ($_SESSION['rol'] == 1) {

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $query = "DELETE FROM proveedor WHERE id_prov = '$id'";
        
        $resultado = mysqli_query($conexion, $query);

        if (!$resultado) {
            die("¡El proveedor no ha sido eliminado!");
        }

        $_SESSION['mensaje'] = '¡Proveedor eliminado!';
        $_SESSION['tipo_de_mensaje'] = 'danger';
        header("Location: proveedor.php");

    }

} else {
    header("Location: ../inicio/error_2.php");
}
