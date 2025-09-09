<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Ejercicio 2</h1>
        <form action="menu.php" method="post" enctype="multipart/form-data">
            <label for="item">Item:</label>
            <input type="text" name="item" required>

            <label for="color">Color:</label>
            <input type="color" name="color" value="#0000ff" required>

            <label for="color_fondo">Color de Fondo:</label>
            <input type="color" name="color_fondo" required>

            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" accept="image/*">

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>