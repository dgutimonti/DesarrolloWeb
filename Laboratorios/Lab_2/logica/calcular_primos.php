
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = isset($_POST['n']) ? (int)$_POST['n'] : 0;

    if ($n > 0) {
        function esPrimo($num) {
            if ($num <= 1) {
                return false;
            }
            for ($i = 2; $i * $i <= $num; $i++) {
                if ($num % $i == 0) {
                    return false;
                }
            }
            return true;
        }

        function obtener_primos($n) {
            $primos = [];
            $num = 2;
            while (count($primos) < $n) {
                if (esPrimo($num)) {
                    $primos[] = $num;
                }
                $num++;
            }
            return $primos;
        }

        $numeros_primos = obtener_primos($n);

        echo <<<HTML
        <!DOCTYPE html>
        <html>
        <head>
            <title>Números Primos Generados</title>
            <style>
                .results {
                    width: 400px;
                    margin: 10px auto;
                    border: 10px solid green;
                    background-color: yellow;
                    padding: 10px;

                }
            </style>
        </head>
        <body>
            <div class="results">
                <h2>Los primeros $n números primos son:</h2>
                <ol type='1'>
HTML;
        foreach ($numeros_primos as $primo) {
            echo "<li>$primo</li>";
        }
        echo <<<HTML
                </ol>
            </div>
            <a href="../ejercicio5.php">Volver</a>
        </body>
        </html>
HTML;
    } else {
        echo "Por favor, ingrese un número válido.";
    }
}
?>
