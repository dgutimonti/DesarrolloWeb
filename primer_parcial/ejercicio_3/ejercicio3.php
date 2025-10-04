<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Ejercicio 3</h1>
        <nav>
            <ul>
                <li><a href="ejercicio3.php?op=introducir" style="text-decoration:none;">Introducir Palabra</a></li>
                <li><a href="pizarra.php?op=cuadrado&palabra=examen&color=ffffff&color_fondo=e20707ff" style="text-decoration:none;">Cuadrado</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php
        if (isset($_GET['op']) && $_GET['op'] == 'introducir') {
        ?>
            <form action="pizarra.php?op=cuadrado" method="post">
                <label for="palabra">Palabra:</label>
                <input type="text" id="palabra" name="palabra" required>
                <br>
                <label for="color">Color de letra:</label>
                <input type="color" id="color" name="color" value="#FFFFFF" required>
                <br>
                <label for="color_fondo">Color de fondo:</label>
                <input type="color" id="color_fondo" name="color_fondo" value="#000000" required>
                <br>
                <button type="submit">Generar Cuadrado</button>
            </form>
        <?php
        }
        ?>
    </main>
</body>
</html>
