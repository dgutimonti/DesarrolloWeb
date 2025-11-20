<?php
include 'conexion.php';

function generarFilasTabla($resultado) {
    $filas = '';
    while ($fila = $resultado->fetch_assoc()) {
        $filas .= "<tr>";
        $filas .= "<td><img src='images/" . $fila['fotografia'] . "' width='50'></td>";
        $filas .= "<td>" . $fila['titulo'] . "</td>";
        $filas .= "<td>" . $fila['tiporeceta'] . "</td>";
        $filas .= "<td>" . substr($fila['preparacion'], 0, 50) . "</td>";
        $filas .= "</tr>";
    }
    return $filas;
}

$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : 'Todos';

if ($tipo == 'Todos') {
    $sql = "SELECT r.fotografia, r.titulo, tr.descripcion as tiporeceta, r.preparacion 
            FROM recetas r 
            JOIN tiporeceta tr ON r.id_tiporeceta = tr.id";
} else {
    $sql = "SELECT r.fotografia, r.titulo, tr.descripcion as tiporeceta, r.preparacion 
            FROM recetas r 
            JOIN tiporeceta tr ON r.id_tiporeceta = tr.id 
            WHERE tr.descripcion = '$tipo'";
}

$resultado = $conexion->query($sql);

echo '<table border="1">';
echo '<thead><tr><th>Fotografía</th><th>Título</th><th>Tipo</th><th>Preparación</th></tr></thead>';
echo '<tbody id="recetas-tabla-body">';
echo generarFilasTabla($resultado);
echo '</tbody>';
echo '</table>';

$conexion->close();
?>