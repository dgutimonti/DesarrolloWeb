<?php
include 'conexion.php';

$id = $_GET['id'];

$sql = "SELECT r.titulo, r.fotografia, tr.descripcion as tiporeceta 
        FROM recetas r
        JOIN tiporeceta tr ON r.id_tiporeceta = tr.id
        WHERE r.id = $id";

$resultado = $con->query($sql);

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $respuesta = [
        'titulo' => $fila['titulo'],
        'imagen' => $fila['fotografia'],
        'tiporeceta' => $fila['tiporeceta']
    ];
    echo json_encode($respuesta);
} else {
    echo json_encode(['error' => 'No se encontró la receta']);
}

$con->close();
?>