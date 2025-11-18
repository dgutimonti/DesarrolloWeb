<?php
include('../conexion.php');

$sql = "SELECT * FROM medicos";
$result = mysqli_query($con,$sql);
?>

<h2>Listado de medicos</h2>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Especialidad</th>
            <th>correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = mysqli_fetch_assoc($result)) :?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['nombre'];?></td>
            <td><?php echo $row['especialidad'];?></td>
            <td><?php echo $row['telefono'];?></td>
            <td><?php echo $row['correo'];?></td>
            <td>
                <button onclick="editarMedico(<?php echo $row['id'];?>)">Editar</button>
                <button onclick="eliminarMedico(<?php echo $row['id'];?>)">Eliminar</button>
            </td>
        </tr>
        <?php endwhile;?>
    </tbody>
</table>