<?php

include('../conexion.php');

$id = $_GET['id'];

$sql = "SELECT * FROM medicos WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result =$stmt->get_result();
$row = $result->fetch_assoc();
?>

<h2>Editar medico</h2>
<form id="formEditMedico">
    <input type="hidden" name="id" value="<?php echo $row['id'];?>">

    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $row['nombre'];?>">

    <label>Especialidad</label>
    <input type="text" name="especialidad" value="<?php echo $row['especialidad'];?>">

    <label>Telefono:</label>
    <input type="text" name="telefono" value="<?php echo $row['telefono'];?>">

    <label>Correo:</label>
    <input type="email" name="correo" value="<?php echo $row['correo'];?>">

    <button type="button" onclick="actualizarMedico()">Actualizar</button>
</form>