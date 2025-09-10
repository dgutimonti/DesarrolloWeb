<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = isset($_POST['n']) ? (int)$_POST['n'] : 0;

    if ($n > 0) {
        echo <<<HTML
        <!DOCTYPE html>
        <html>
        <head>
            <title>Ingresar Palabras</title>
        </head>
        <body>
            <h1>Ingresar Palabras</h1>
            <form action="ordenar.php" method="post">
HTML;
        for ($i = 0; $i < $n; $i++) {
            echo "<label for='palabra_" . ($i + 1) . "'>Palabra " . ($i + 1) . ":</label>";
            echo "<input type='text' name='palabras[]' id='palabra_" . ($i + 1) . "' required><br><br>";
        }
        echo <<<HTML
                <input type="submit" value="Ordenar">
            </form>
        </body>
        </html>
HTML;
    } else {
        echo "Por favor, ingrese un número válido.";
    }
}
?>