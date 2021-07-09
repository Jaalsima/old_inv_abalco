<?php
include("../includes/db.php");
include("../includes/header.php");
?>

<?php
if (isset($_POST['confirmar_venta'])) {
    $id_venta = $_POST["id_venta"];
    $doc_user = $_POST["id_usuario"];
    $id_cliente = $_POST["id_cliente"];
    $id_producto = $_POST["id_producto"];
    $cantidad = $_POST["cantidad"];
    $v_unitario = $_POST["v_unitario"];
    $v_total = $_POST["v_total"];

    $query_1 = "INSERT INTO venta (id_venta, fk_id_vendedor, fk_id_cliente) VALUES ('$id_venta', '$doc_user', '$id_cliente')";
    mysqli_query($conexion, $query_1);

    $query_2 = "INSERT INTO detalle_venta (fk_id_venta, fk_id_prod_venta, cantidad_vendida, valor_unitario, valor_total) VALUES ('$id_venta', '$id_producto', $cantidad, $v_unitario, $v_total)";
    mysqli_query($conexion, $query_2);

    $query_3 = "UPDATE producto SET cantidad = (cantidad - $cantidad) WHERE id_prod = '$id_producto'";
    mysqli_query($conexion, $query_3);

    $_SESSION['mensaje'] = "¡La información de la venta ha sido guardada exitosamente!";
    $_SESSION['tipo_de_mensaje'] = 'success';
    header("Location: venta.php");
}
?>