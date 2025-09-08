<html>
    <head>
        <link rel="stylesheet" href="../../public/css/formularios.css">
    </head>
    <body>
        <a href="../misamigos.php" style="color: blue; text-decoration: none; font-size: 20px;">Atras</a>
        <h1>Insertar Nuevo Amigo</h1>
        <form action="../../controller/AmigoController.php" method="post">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="apellidos" placeholder="Apellidos" required>
            <input type="text" name="celular" placeholder="Celular" required>
            <input type="email" name="correo" placeholder="Correo" required>
            <input type="submit" value="Insertar Amigo">
        </form>
    </body>
</html>