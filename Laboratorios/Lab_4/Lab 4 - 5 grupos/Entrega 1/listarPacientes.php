<?php 
include("conexion.php");
$sql = "SELECT id, nombre, documento, telefono, correo FROM pacientes";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Médicos</title>
</head>
<body>
    <div style="margin: 20px auto; align-items: center; text-align: center;">
        <h2 style="text-align: center;">Listado de Pacientes</h2>
        <table border="1" style="border-collapse: collapse; margin: 0 auto;">
            <tr>
                <th>Nombre</th>
                <th>Documento</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
            <?php while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?= $row['nombre']; ?></td>
                    <td><?= $row['documento']; ?></td>
                    <td><?= $row['telefono']; ?></td>
                    <td><?= $row['correo']; ?></td>
                    <td>
                        <a href="javascript:cargarContenido('formEditPaciente.php?id=<?= $row['id']; ?>')">Editar</a>
                        <a href="javascript:eliminarPaciente(<?= $row['id']; ?>)">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
