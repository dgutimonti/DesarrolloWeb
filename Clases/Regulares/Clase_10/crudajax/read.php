<?php include("conexion.php");

$sql="SELECT id,nombres,apellidos,fecha_nacimiento,sexo,correo FROM personas";

$resultado=$con->query($sql);

?>
<table style="border-collapse: collapse" border="1" >
    <thead>
        <tr>
            <th width="100px">Nombres</th>
            <th width="100px">Apellidos</th>
            <th width="60px">Fec.Nacimiento</th>
            <th width="10px">Sexo</th>
            <th width="150px">Correo</th>
            <th>Operaciones</th>
        </tr>
    </thead>
    
 <?php 
 while($row=mysqli_fetch_array($resultado)){
    ?>
    <tr>
        <td><?php echo $row['nombres'];?></td>
        <td><?php echo $row['apellidos'];?></td>
        <td><?php echo $row['fecha_nacimiento'];?></td>
        <td><?php echo $row['sexo'];?></td>
        <td><?php echo $row['correo'];?></td>
        <td><a href="javascript:formEditar(<?php echo $row['id'];?>)">Editar</a>  <a href="javascript:eliminar(<?php echo $row['id'];?>)">Eliminar</a> </td>
    </tr>
    <?php } ?>
 </table>

 <a href="javascript:cargarContenido('forminsertar.html')"> Insertar</a>
 