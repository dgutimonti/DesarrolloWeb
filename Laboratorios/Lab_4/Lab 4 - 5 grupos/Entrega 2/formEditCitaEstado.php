<?php
include("conexion.php");
$id = $_GET['id'];

$sql = "SELECT id, estado FROM citas WHERE id=?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estado de Cita</title>
</head>
<body>
    <h2 style="text-align: center;">Editar Estado de Cita</h2>
    <div style="margin: 15px;">
        <form action="javascript:editarEstadoCita()" method="post" id="formEditEstadoCita">

            <label for="estado">Estado actual:</label><br>
            <select name="estado" required>
                <option value="" disabled>Seleccione un nuevo estado</option>
                <option value="Pendiente" <?= ($row['estado'] == 'Pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                <option value="Atendida" <?= ($row['estado'] == 'Atendida') ? 'selected' : ''; ?>>Atendida</option>
                <option value="Cancelada" <?= ($row['estado'] == 'Cancelada') ? 'selected' : ''; ?>>Cancelada</option>
            </select>
            <br><br>

            <input type="hidden" name="id" value="<?= $row['id']; ?>">
            <input type="submit" value="Actualizar Estado">
        </form>
    </div>
</body>
</html>
