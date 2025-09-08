<?php
include("conexion.php");
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$sexo=$_POST['sexo'];
$numero_documento=$_POST['numero_documento'];
$ocupacion_id=$_POST['ocuapacion_id'];
$id=$_POST['id'];

$sql="UPDATE padron SET nombres=?, apellidos=?, sexo=?, numero_docuemento=?, ocupacion_id=? WHERE id=?";
$stmt=$con->prepare($sql);
$stmt->bind_param('ssssii', $nombres, $apellidos, $sexo, $numero_documento, $ocupacion_id);
if($stmt->execute()){
    echo 'Registro actualizado';
}
?>
<meta http-equiv="refresh" content="2;url=read.php">