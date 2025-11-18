<?php
include("conexion.php");
$id=$_GET['id'];
$sql="DELETE FROM medicos WHERE id=?";
$stmt=$con->prepare($sql);
$stmt->bind_param("i",$id);
$stmt->execute();
echo "<h1>Médico eliminado con éxito</h1>";
?>