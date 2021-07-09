<?php

include("../includes/db.php");

if ($_SESSION['rol'] == 1) {
    if (isset($_POST["guardar"])) {
        $id = $_POST["id_cliente"];
        $nombre = $_POST["nombre_cliente"];
        $direccion = $_POST["dir_cliente"];
        $telefono = $_POST["tel_cliente"];
        $email = $_POST["email_cliente"];
    }

    $query = "INSERT INTO cliente(id_cliente, nombre_cliente, dir_cliente, tel_cliente, email_cliente) VALUES ('$id', '$nombre', '$direccion', '$telefono', '$email')";
    $resultado = mysqli_query($conexion, $query);
    if (!$resultado) {
        die("No se ha podido guardar el cliente");
    }

    $_SESSION["mensaje"] = "Cliente Guardado Exitosamente";
    $_SESSION["tipo_de_mensaje"] = "success";
    header("location: cliente.php");  //Esta instrucción se utiliza para redireccionar//
} else {
    header("Location: ../inicio/error_2.php");
}
