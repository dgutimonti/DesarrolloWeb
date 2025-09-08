<?php
include('conexion.php');
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$sexo=$_POST['sexo'];
$ocupacion_id=$_POST['ocupacion_id'];
$numero_documento=$_POST['numero_docuemento'];
$sql="INSERT INTO padron(nombres, apellidos, sexo, numero_documento, ocuapcion_id) VALUES (?, ?, ?, ?, ?)";
$stmt=$con->prepare($sql);
$stmt->bind_param('ssssi', $nombres, $apellidos, $sexo, $ocupacion_id, $numero_documento);
if($stmt->execute()){
    echo 'Registro exitoso';
}?>
<meta http-equiv="refresh" content="2;url=read.php">