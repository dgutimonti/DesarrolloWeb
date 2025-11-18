<?php
include("conexion.php");
$nombre=$_POST['nombre'];
$especialidad=$_POST['especialidad'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];

$sql="INSERT INTO medicos(nombre, especialidad, telefono, correo) VALUES  (?,?,?,?)";
$stmt=$con->prepare($sql);
$stmt->bind_param("ssis",$nombre,$especialidad, $telefono, $correo);
$stmt->execute();
echo "<h1>Médico creado con éxito</h1>";
?>
