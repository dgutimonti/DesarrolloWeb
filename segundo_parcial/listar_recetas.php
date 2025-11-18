<?php
include 'conexion.php';
$sql = "SELECT id, tiporeceta FROM tiporeceta";
$resultado = $con->query($sql);
$tiporeceta=array();
while($row = $resultado->fetch_assoc()) $tiporeceta[] = $row;
echo json_encode($tiporeceta, JSON_UNESCAPED_UNICODE);
?>



