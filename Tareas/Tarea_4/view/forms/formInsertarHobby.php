<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Hobby</title>
    <link rel="stylesheet" href="../../public/css/formularios.css">
</head>
<body>
    <div class="container">
        <form action="../../controller/HobbyController.php" method="post" enctype="multipart/form-data">
            <h2>Insertar Hobby</h2>
            <input type="hidden" name="action" value="insert">
            <label for="nombres">Nombres:</label>
            <input type="text" name="nombres" id="nombres" required>
            <label for="fotografia">Fotografía:</label>
            <input type="file" name="fotografia" id="fotografia" required>
            <input type="submit" value="Insertar">
        </form>
    </div>
</body>
</html>