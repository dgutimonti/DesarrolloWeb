<?php
include("conexion.php");
$sqlMedicos = "SELECT id, nombre FROM medicos";
$resultMedicos = $con->query($sqlMedicos);

$sqlPacientes = "SELECT id, nombre FROM pacientes";
$resultPacientes = $con->query($sqlPacientes);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2 style="text-align: center;">Introducir Cita Médica</h2>
    <div style="margin: 15px;">
        <form action="javascript:crearCitaMedica()" method="post" id="formCitaMedica">
            <label for="id_paciente">Seleccionar Paciente</label><br>
            <select name="id_paciente">
                <option value="" selected disabled>Seleccione un paciente</option>
                <?php while ($rowPaciente = $resultPacientes->fetch_assoc()): ?>
                    <option value="<?= $rowPaciente['id']; ?>"><?= $rowPaciente['nombre']; ?></option>
                <?php endwhile; ?>
            </select>
            <br><br>

            <form action="javascript:crearCitaMedica()" method="post" id="formCitaMedica">
                <label for="id_medico">Seleccionar Médico</label><br>
                <select name="id_medico">
                    <option value="" selected disabled>Seleccione un médico</option>
                    <?php while ($rowMedico = $resultMedicos->fetch_assoc()): ?>
                        <option value="<?= $rowMedico['id']; ?>"><?= $rowMedico['nombre']; ?></option>
                    <?php endwhile; ?>
                </select>
                <br><br>

                <label for="fecha_cita">Fecha de Cita</label><br>
                <input type="date" name="fecha_cita" required>
                <br>

                <label for="hora_cita">Hora de Cita</label><br>
                <select name="hora_cita" required>
                    <option value="" selected disabled>Seleccione hora</option>
                    <?php
                    for ($h = 8; $h <= 18; $h++) {
                        for ($m = 0; $m < 60; $m += 15) {
                            $hora = ($h < 10 ? "0$h" : $h) . ":" . ($m == 0 ? "00" : $m);
                            echo "<option value='$hora'>$hora</option>";
                        }
                    }
                    ?>
                </select>

                <br>

                <label for="motivo">Motivo</label><br>
                <input type="text" name="motivo" required>
                <br>
                <br>
                <input type="submit" value="Crear Cita Médica">
            </form>
    </div>

</body>

</html>