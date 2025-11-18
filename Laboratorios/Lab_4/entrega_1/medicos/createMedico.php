<?php

include('../conexion.php');

$nombre = $_POST['nombre'];
$especialidad = $_POST['especialidad'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

$sql = "INSERT INTO medicos (nombre, especialidad, telefono, correo) VALUES (?, ?, ?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("ssss", $nombre, $especialidad, $telefono, $correo);

if($stmt->execute()){
    echo "Medico Registrado exitosamente";
} else {
    echo "Error al registar: " . $stmt->error;
}

$con->close();
?>