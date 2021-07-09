<?php
include("../includes/db.php");

if ($_SESSION['rol'] == 1) {

    if (isset($_POST["guardar"])) {
        $id = $_POST["id_prov"];
        $nombre = $_POST["nombre_prov"];
        $direccion = $_POST["dir_prov"];
        $telefono = $_POST["tel_prov"];
        $email = $_POST["email_prov"];
    }

    $query = "INSERT INTO proveedor(id_prov, nombre_prov, dir_prov, tel_prov, email_prov) VALUES ('$id', '$nombre', '$direccion', '$telefono', '$email')";
    $resultado = mysqli_query($conexion, $query);
    if (!$resultado) {
        die("¡No se ha podido guardar el proveedor!");
    }

    $_SESSION["mensaje"] = "¡Proveedor Guardado Exitosamente!";
    $_SESSION["tipo_de_mensaje"] = "success";
    header("location: proveedor.php"); //Esta instrucción se utiliza para redireccionar//

} else {
    header("Location: ../inicio/error_2.php");
}
