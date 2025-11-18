<?php
include("conexion.php");
$nombre=$_POST['nombre'];
$documento=$_POST['documento'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$id=$_POST['id'];

$sql="UPDATE pacientes SET nombre=?, documento=?, telefono=?, correo=? WHERE id=?";
$stmt=$con->prepare($sql);
$stmt->bind_param("ssisi",$nombre,$documento, $telefono, $correo, $id);
$stmt->execute();
?>