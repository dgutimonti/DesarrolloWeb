<?php
include '../../model/Conexion.php';
$id = $_GET['id'];
$sql = "SELECT * FROM hobbies WHERE id = $id";
$result = $con->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Hobby</title>
    <link rel="stylesheet" href="../../public/css/formularios.css">
</head>
<body>
    <div class="container">
        <form action="../../controller/HobbyController.php" method="post" enctype="multipart/form-data">
            <h2>Actualizar Hobby</h2>
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="nombres">Nombres:</label>
            <input type="text" name="nombres" id="nombres" value="<?php echo $row['nombres']; ?>" required>
            <label for="fotografia">Fotografía:</label>
            <input type="file" name="fotografia" id="fotografia">
            <img src="../../public/img/<?php echo $row['fotografia']; ?>" width="100">
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>