<?php
include("conexion.php");
$nombre=$_POST['nombre'];
$especialidad=$_POST['especialidad'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$id=$_POST['id'];

$sql="UPDATE medicos SET nombre=?, especialidad=?, telefono=?, correo=? WHERE id=?";
$stmt=$con->prepare($sql);
$stmt->bind_param("ssisi",$nombre,$especialidad, $telefono, $correo, $id);
$stmt->execute();
?>