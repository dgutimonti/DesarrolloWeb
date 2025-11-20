<?php
include 'conexion.php';


if (isset($_GET['tipo'])) {
    $tipo = $_GET['tipo'];
    if ($tipo == 'Todos') {
        $sql = "SELECT r.fotografia, r.titulo, tr.tiporeceta, r.preparacion 
                FROM recetas r 
                JOIN tiporeceta tr ON r.idtiporeceta = tr.id";
    } else {
        $sql = "SELECT r.fotografia, r.titulo, tr.tiporeceta, r.preparacion 
                FROM recetas r 
                JOIN tiporeceta tr ON r.idtiporeceta = tr.id 
                WHERE tr.tiporeceta = '$tipo'";
    }
    $resultado = $con->query($sql);
    $recetas = [];
    while ($row = $resultado->fetch_assoc()) {
        $recetas[] = $row;
    }
    echo json_encode(['recetas' => $recetas]);
} else {
    $sql_tipos = "SELECT tiporeceta FROM tiporeceta";
    $resultado_tipos = $con->query($sql_tipos);
    $tipos = [];
    while ($row = $resultado_tipos->fetch_assoc()) {
        $tipos[] = $row['tiporeceta'];
    }

    $sql_recetas = "SELECT r.fotografia, r.titulo, tr.tiporeceta, r.preparacion 
                    FROM recetas r 
                    JOIN tiporeceta tr ON r.idtiporeceta = tr.id";
    $resultado_recetas = $con->query($sql_recetas);
    $recetas = [];
    while ($row = $resultado_recetas->fetch_assoc()) {
        $recetas[] = $row;
    }

    echo json_encode(['tipos' => $tipos, 'recetas' => $recetas]);
}
?>