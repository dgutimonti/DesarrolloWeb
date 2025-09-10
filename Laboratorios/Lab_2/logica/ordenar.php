<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $palabras = isset($_POST['palabras']) ? $_POST['palabras'] : [];

    function ordenarPalabras($palabras) {
        sort($palabras, SORT_STRING);
        return $palabras;
    }

    $palabras_ordenadas = ordenarPalabras($palabras);

    echo <<<HTML
    <!DOCTYPE html>
    <html>
    <head>
        <title>Palabras Ordenadas</title>
        <style>
            .results {
                border: 2px solid red;
                background-color: yellow;
                padding: 10px;
                width: 50%;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <div class="results">
            <h2>Palabras Ordenadas Alfabéticamente:</h2>
            <ul>
HTML;
    foreach ($palabras_ordenadas as $palabra) {
        echo "<li>$palabra</li>";
    }
    echo <<<HTML
            </ul>
        </div>
        <a href="../ejercicio4.php">Volver</a>
    </body>
    </html>
HTML;
}
?>