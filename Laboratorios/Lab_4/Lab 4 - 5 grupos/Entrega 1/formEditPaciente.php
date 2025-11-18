<?php
include("conexion.php");
$id=$_GET['id'];
$sql="SELECT id,nombre,documento,telefono,correo FROM pacientes WHERE id=?";
$stmt=$con->prepare($sql);
$stmt->bind_param("i",$id);
$stmt->execute();
$result=$stmt->get_result();
$row=$result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 style="text-align: center;">Editar Paciente</h2>
    <div style="margin: 15px;">
        <form action="javascript:editarPaciente()" method="post" id="formPacienteEdit">
        <label for="nombre">Nombre: </label><br>
        <input type="text" name="nombre" value="<?= $row['nombre']; ?>"><br>
        <label for="documento">Documento: </label><br>
        <input type="text" name="documento" value="<?= $row['documento']; ?>"><br>
        <label for="telefono">Teléfono: </label><br>
        <input type="number" name="telefono" value="<?= $row['telefono']; ?>"><br>
        <label for="correo">Correo: </label><br>
        <input type="email" name="correo" value="<?= $row['correo']; ?>"><br><br>
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <input type="submit" value="Actualizar Médico">
    </form>
    </div>
</body>
</html>