<?php
include("conexion.php");

$id_paciente = $_POST['id_paciente'];
$id_medico   = $_POST['id_medico'];
$fecha_cita  = $_POST['fecha_cita'];
$hora_cita   = $_POST['hora_cita'];
$motivo      = $_POST['motivo'];

$sqlCheck = "SELECT COUNT(*) FROM citas WHERE id_medico=? AND fecha_cita=? AND hora_cita=?";
$check = $con->prepare($sqlCheck);
$check->bind_param("iss", $id_medico, $fecha_cita, $hora_cita);
$check->execute();
$check->bind_result($count);
$check->fetch();
$check->close();


if ($count == 0) {
    $sql = "INSERT INTO citas(id_paciente, id_medico, fecha_cita, hora_cita, motivo)
            VALUES  (?,?,?,?,?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("iisss", $id_paciente, $id_medico, $fecha_cita, $hora_cita, $motivo);
    $stmt->execute();
    $stmt->close();
    echo "<h1>Cita médica creada con éxito</h1>";
}
else {
    echo "<h1>Error: El médico ya tiene una cita programada en esa fecha y hora.</h1>";
}
?>
