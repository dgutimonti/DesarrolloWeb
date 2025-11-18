<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segundo Examen Parcial de SIS-256</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <header>
        <h1>Segundo Examen Parcial de SIS-256</h1>
        <div id="login">
            <button onclick="pregunta4()">Login</button>
        </div>
    </header>
    <nav>
        <button onclick="toggleMenu()">Menu</button>
        <div id="menu-buttons">
            <button onclick="mostrarInicio()">Inicio</button>
            <button onclick="pregunta1()">Pregunta 1</button>
            <button onclick="pregunta2()">Pregunta 2</button>
            <button onclick="pregunta3()">Pregunta 3</button>
        </div>
    </nav>
    <main>
        <div id="barra">
        </div>
        <div id="contenido">
        </div>
        <div id="historial">
            <h2>Historial</h2>
        </div>
    </main>
    <footer>
        <p>Copyright © 2025</p>
    </footer>
    <script src="js/funciones.js"></script>
    <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
        <button onclick="closeModal()">Aceptar</button>
    </div>
</body>
</html>