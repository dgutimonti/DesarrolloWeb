<?php
include("conexion.php");
$id=$_GET['id'];
$sql="DELETE FROM pacientes WHERE id=?";
$stmt=$con->prepare($sql);
$stmt->bind_param("i",$id);
$stmt->execute();
?>