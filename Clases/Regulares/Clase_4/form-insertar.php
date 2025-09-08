<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include('conexion.php');
    $sql="SELECT id, nombre FROM ocuapaciones";
    $result=$con->query($sql);
    ?>

    <form action="insert.php" method="post">
        <label for="fotografia">
            Fotografia
            <input type="file" name="fotografia">
        </label>
        <label for="nombres">
            Nombres
            <input type="text" name="nombres">
        </label>
        <label for="apellidos">
            <input type="text" name="apellidos">
        </label>
        <label for="sexo">
            <select name="sexo">
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
        </label>
        <label for="numero_documento">
            Numero Documento
            <input type="text" name="numero_documento">
        </label>
        <label for="ocupacion">
            Ocupacion
            <select name="ocupacion">
                <?php while ($row=mysqli_fetch_array($result))
                {
                    ?>
                    <option value="<?php echo $row['id'];?>">
                        <?php echo $row['nombre'];?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </label>
    </form>
</body>
</html>