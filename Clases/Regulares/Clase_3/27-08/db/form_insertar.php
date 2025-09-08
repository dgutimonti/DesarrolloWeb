<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario insertar</title>
</head>
<body>
    <?php 
    include('conexion.php');
    $sql="SELECT  id_ocupaciones from ocupaciones";
    $result=$con->query($sql);
    ?>

    <form action="" method="post">
        <div>
            <label for="fotorgrafia">fotorgrafia</label>
            <input type="file" name="" id="">
        </div>
        <div>
            <label for="nombres">Ingresar nombre</label>
            <input type="text" name="nombres" id="">
        </div>
        <div>
            <label for="apellidos">Ingresar apellidos</label>
            <input type="text" name="apellidos" id="">
        </div>
        <div>
            <label for="sexo">Sexo</label>
            <select name="sexo" id="">
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
        </div>
        <div>
            <label for="numero_documento">Ingrese su numero de documento</label>
            <input type="text" name="numero_documento" id="">
        </div>
        <div>
            <label for="ocupacion">ocupacion</label>

            <select name="ocupacion_id">
                <?php 
                while($row=mysqli_fetch_array($result))
                {
                ?>
                <option value=""><?php echo $row['id'];?></option>
                }

            </select>

        </div>
        <div>
            <input type="submit" value="Enviar">
        </div>
    </form>
    <a href="insert.php">insertar</a>
</body>
</html>