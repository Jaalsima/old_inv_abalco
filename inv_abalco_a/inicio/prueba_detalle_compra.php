<?php
include("../includes/header.php");
include("../includes/db.php");

$query_2 = "INSERT INTO detalle_compra (fk_id_compra, fk_id_prod_compra, cantidad_comprada, valor_unitario, valor_total) VALUES ('compra_01', 'prod_01', 100, 1650, 165000)";
mysqli_query($conexion, $query_2);
