<?php
include("conexion.php");
include("proteger.php");
include("permiso.php");
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$sexo=$_POST['sexo'];
$ocupacion_id=['ocupacion_id'];
$numero_documento=$_POST['numero_documento'];
if (isset($_FILES['fotografia']['name'])){
    $nombre_archivo=$_FILES['fotografia']['name'];
    $nombre_temporal=$_FILES['fotografia']['tmp_name'];
    
    
}
$sql="INSERT INTO padron(fotografia, nombres,apellidos,sexo,numero_documento,ocupacion_id) Values(?,?,?,?,?,?)";
$stmt=$con->prepare($sql);
$stmt->bind_param("ssssi",$nombre_nuevo, $nombres,$apellidos,$sexo,$numero_documento,$ocupacion_id);
if($stmt->execute())
{
    echo "registro exitoso";
}
?>
<meta http-equiv="refresh" content="2;url=read.php">