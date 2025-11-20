<?php
require_once 'conexion.php';

$id = $_GET['id'];

$sql = "SELECT r.id, r.titulo, r.imagen, tr.descripcion as tiporeceta 
        FROM recetas r
        JOIN tiporeceta tr ON r.id_tiporeceta = tr.id
        WHERE r.id = $id";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    echo json_encode($fila);
} else {
    echo json_encode(['error' => 'No se encontró la receta']);
}

$conexion->close();
?>