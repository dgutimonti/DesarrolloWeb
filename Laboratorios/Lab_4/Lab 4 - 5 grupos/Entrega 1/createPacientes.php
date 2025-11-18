<?php
include("conexion.php");
$nombre=$_POST['nombre'];
$documento=$_POST['documento'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];

$sql="INSERT INTO pacientes(nombre, documento, telefono, correo) VALUES  (?,?,?,?)";
$stmt=$con->prepare($sql);
$stmt->bind_param("ssis",$nombre,$documento, $telefono, $correo);
$stmt->execute();
?>
