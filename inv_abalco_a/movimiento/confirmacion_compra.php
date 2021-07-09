<?php
include("../includes/db.php");
?>

<?php

if ($_SESSION['rol'] == 1) {

    if (isset($_POST['confirmar_compra'])) {
        $id_compra = $_POST["id_compra"];
        $doc_user = $_POST["id_usuario"];
        $id_prov = $_POST["id_proveedor"];
        $id_producto = $_POST["id_producto"];
        $cantidad = $_POST["cantidad"];
        $v_unitario = $_POST["v_unitario"];
        $v_total = $_POST["v_total"];

        $query_1 = "INSERT INTO compra (id_compra, fk_id_admin, fk_id_proveedor) VALUES ('$id_compra', '$doc_user', '$id_prov')";
        mysqli_query($conexion, $query_1);

        $query_2 = "UPDATE producto SET cantidad = (cantidad + $cantidad) WHERE id_prod = '$id_producto'";
        mysqli_query($conexion, $query_2);

        $query_3 = "INSERT INTO `inv_abalco`.`detalle_compra` (`id_det_compra`, `fk_id_compra`, `fk_id_prod_compra`, `cantidad_comprada`, `valor_unitario`, `valor_total`) VALUES ('$id_compra', '$id_producto', '$cantidad', '$v_unitario', '$v_total')";
        mysqli_query($conexion, $query_3);

        
        $_SESSION['mensaje'] = "¡La información de la compra ha sido guardada exitosamente!";
        $_SESSION['tipo_de_mensaje'] = 'success';
        header("Location: compra.php");

        
    }
} else {
    header("Location: ../inicio/error_2.php");
}
?>