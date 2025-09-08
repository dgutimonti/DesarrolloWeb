<?php
include('conexion.php');
$id=$_GET['id'];
$sql= "SELECT id, fotografia, nombres, apellidos, sexo, numero_documento, ocuacion_id FROM padron WHERE id=?";
$stmt=$con->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$result=$stmt->get_result();
$row=$result->fetch_assoc();

$sql="SELECT id, nombre, FROM ocupaciones";
$result2=$con->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="edit.php" method="post">
        <label for="fotografia">
            fotografia: 
            <img src="img/<?php echo $row['fotografia'];?>">
            <input type="file" name="fotografia">
        </label>
        <label for="nombres">
            Nombres:
            <input type="text" name="nombres" value="<?php echo $row['nombres'];?>">
        </label>
        <label for="apellidos">
            Apellidos
            <input type="text" name="apellidos" value="<?php echo $row['apellidos'];?>">
        </label>
        <label for="sexo">
            Sexo:
            <select name="sexo">
                <option value="M" <?php echo $row['sexo'] == 'M' ? 'selected' : '' ?>>Masculino</option>
                <option value="F" <?php echo $row['sexo'] == 'F' ? 'selected' : '' ?>>Femenino</option>
            </select>
        </label>
        <label for="numero_documento">
            Numero Documento:
            <input type="text" name="numero_documento" value="<?php echo $row['numero_docuemento'];?>">
        </label>
        <label for="ocupacion">
            Ocupacion:
            <select name="ocupacion_id">
                <?php while ($row2=mysqli_fetch_array($result2))
                { ?>
                    <option value="<?php echo $row2['id'];?>" <?php echo $row2['id'] == $row['ocupacion_id'] ? 'selected' : '' ?>>
                        <?php echo $row2['nombre'];?>
                    </option>
                    <?php
                }
                ?>
            </select>
            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
            <input type="submit" value="Registrar">
        </label>
    </form>
</body>
</html>