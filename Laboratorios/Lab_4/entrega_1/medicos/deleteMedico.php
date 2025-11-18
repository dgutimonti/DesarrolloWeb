<?php
include('../conexion.php');

// Validar correctamente la existencia del parámetro
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Error: No se recibió un ID válido para eliminar";
    exit;
}

$id = $_GET['id'];

$sql = "DELETE FROM medicos WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Médico eliminado exitosamente";
} else {
    echo "Error al eliminar: " . $stmt->error;
}

$con->close();
?>

