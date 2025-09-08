<?php
include_once("../../model/Conexion.php"); 
include_once("../../controller/AmigoController.php"); 

if (!isset($_GET['id'])) {
    die("Error: No se especificó un ID de amigo.");
}

$id = $_GET['id'];

$controller = new AmigoController($con);
$amigo = $controller->obtenerAmigoPorId($id);

if (!$amigo) {
    die("Error: Amigo no encontrado.");
}
?>
<html>
    <head>
        <link rel="stylesheet" href="../../public/css/formularios.css">
        <title>Editar Amigo</title>
    </head>
    <body>
        <a href="../misamigos.php" style="color: blue; text-decoration: none; font-size: 20px;">Atras</a>
        <form action="../../controller/AmigoController.php" method="post">
            <h1>Editar Amigo</h1>
            <input type="hidden" name="id" value="<?php echo $amigo['id']; ?>">
            <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $amigo['nombre']; ?>" required>
            <input type="text" name="apellidos" placeholder="Apellidos" value="<?php echo $amigo['apellidos']; ?>" required>
            <input type="text" name="celular" placeholder="Celular" value="<?php echo $amigo['celular']; ?>" required>
            <input type="email" name="correo" placeholder="Correo" value="<?php echo $amigo['correo']; ?>" required>
            <input type="submit" value="Actualizar Amigo">
        </form>
    </body>
</html>
