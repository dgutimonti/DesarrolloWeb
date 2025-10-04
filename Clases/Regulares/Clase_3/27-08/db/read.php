<?php
session_start();
include("conexion.php");
include("proteger.php");

if (isset($_GET['orden'])){
    $orden=$_GET['orden'];
} else{
    $orden=$id;
}

$buscar='%';

if (isset($_GET['buscar'])){
    $buscar='%'.$_GET['buscar'].'%';
} else
{

}
$sql = "SELECT p.id, fotografia, nombres, apellidos, sexo, numero_documento, ocupacion 
LEFT JOIN ocuapciones o ON p.ocupacion_id=o.id
WHERE nombres LIKE  ?
ORDER BY ?";

$stmt=$con->prepare($sql);
$stmt->bind_param("si", $buscar, $orden);
$stmt->execute();
$result=$stmt->get_result();


?>
<form action="" method="get">
    <label for="buscar">buscar</label>
    <input type="text" name="buscar">
    <input type="submit" value="Buscar">
</form>
<table border="1">
    <tr>
        <th><a href="read.php?">Nombres</a></th>
        <th><a href="">Apellido</a></th>
        <th><a href="">Sexo</a></th>
        <th><a href="">Numero Documento</a></th>
    </tr>
    <?php
        while($row=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $row['nombres'];?></td>
                <td><?php echo $row['apellidos'];?></td>
                <td><?php echo $row['sexo']?>;</td>
                <td><?php echo $row['ocupacion'];?></td>
                <td>
                    <?php if ($_SESSION['rol'] == 'admin')
                    {
                        ?>

                    <a href="form-edit.php?<?php echo $row['id'];?>">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id'];?>">Eliminar</a>

                <?php } ?>
                </td>
            </tr>
            <?php
        }
        ?>
</table>
<?php if ($_SESSION['rol'] == 'admin'){
    ?>
<a href="insertar.php">insertart</a>
?>
}
<?php
// /*
// Este script PHP se encarga de leer datos de la tabla 'padron' en la base de datos y mostrarlos en una tabla HTML.

// 1. Inclusión del archivo de conexión:
//    `include("conexion.php");`
//    Este línea incluye el archivo `conexion.php`, el cual establece la conexión a la base de datos.
//    La variable `$con` (que representa la conexión) se define en `conexion.php` y se utiliza aquí.

// 2. Consulta SQL:
//    `$sql="SELECT id, nombres, apellidos, sexo, numero_documento from padron";`
//    Se define una consulta SQL para seleccionar las columnas `id`, `nombres`, `apellidos`, `sexo` y `numero_documento`
//    de la tabla llamada `padron`.

// 3. Ejecución de la consulta:
//    `$result=$con->query($sql);`
//    La consulta SQL (`$sql`) se ejecuta en la base de datos a través del objeto de conexión `$con`.
//    El resultado de la consulta se almacena en la variable `$result`.

// 4. Estructura de la tabla HTML:
//    Se inicia una tabla HTML (`<table>`) con una fila de encabezados (`<th>`) para cada columna que se mostrará:
//    - Nombres
//    - Apellido
//    - Sexo
//    - Numero Documento

// 5. Iteración y visualización de datos:
//    `while($row=mysqli_fetch_array($result)){ ... }`
//    Se utiliza un bucle `while` para iterar sobre cada fila de resultados obtenida de la consulta.
//    - `mysqli_fetch_array($result)`: Esta función obtiene una fila de resultados como un array asociativo (y numérico)
//      y la asigna a la variable `$row`. El bucle continúa mientras haya filas para procesar.

//    Dentro del bucle, por cada fila:
//    - Se crea una nueva fila de tabla (`<tr>`).
//    - Se crean celdas de tabla (`<td>`) para mostrar los valores de cada columna de la fila