<?php  
include("conexion.php");

$m = $_GET['m'] ?? '';
$p = $_GET['p'] ?? '';
$e = $_GET['e'] ?? '';

$sql = "SELECT 
            c.id,
            p.nombre AS paciente,
            m.nombre AS medico,
            c.fecha_cita,
            c.hora_cita,
            c.estado,
            c.motivo
        FROM citas c
        INNER JOIN pacientes p ON c.id_paciente = p.id
        INNER JOIN medicos m ON c.id_medico = m.id
        WHERE 1";

if ($m) $sql .= " AND m.id='$m'";
if ($p) $sql .= " AND p.id='$p'";
if ($e) $sql .= " AND c.estado='$e'";

$result = $con->query($sql);

$resultMedicos = $con->query("SELECT id, nombre FROM medicos");
$resultPacientes = $con->query("SELECT id, nombre FROM pacientes");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Citas Médicas</title>
</head>
<body>
    <div style="margin: 20px auto; text-align: center;">
        <h2>Listado de Citas Médicas</h2>

        <label for="filtroMedico">Médico:</label>
        <select id="filtroMedico" name="filtroMedico">
            <option value="">Todos</option>
            <?php while ($rowMedico = $resultMedicos->fetch_assoc()): ?>
                <option value="<?= $rowMedico['id']; ?>"><?= $rowMedico['nombre']; ?></option>
            <?php endwhile; ?>
        </select>

        <label for="filtroPaciente">Paciente:</label>
        <select id="filtroPaciente" name="filtroPaciente">
            <option value="">Todos</option>
            <?php while ($rowPaciente = $resultPacientes->fetch_assoc()): ?>
                <option value="<?= $rowPaciente['id']; ?>"><?= $rowPaciente['nombre']; ?></option>
            <?php endwhile; ?>
        </select>

        <label for="filtroEstado">Estado:</label>
        <select id="filtroEstado" name="filtroEstado">
            <option value="">Todos</option>
            <option value="Pendiente">Pendiente</option>
            <option value="Atendida">Atendida</option>
            <option value="Cancelada">Cancelada</option>
        </select>

        <button onclick="filtrarCitas()">Filtrar</button>

        <br><br>

        <table border="1" style="border-collapse: collapse; margin: 0 auto;">
            <tr>
                <th>Paciente</th>
                <th>Médico</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>Motivo</th>
                <th>Acciones</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['paciente']; ?></td>
                <td><?= $row['medico']; ?></td>
                <td><?= $row['fecha_cita']; ?></td>
                <td><?= $row['hora_cita']; ?></td>
                <td><?= $row['estado']; ?></td>
                <td><?= $row['motivo']; ?></td>
                <td>
                    <a href="javascript:cargarContenido('formEditCitaEstado.php?id=<?= $row['id']; ?>')">Cambiar estado</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
