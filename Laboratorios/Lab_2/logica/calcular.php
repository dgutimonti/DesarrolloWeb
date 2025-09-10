<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_string = $_POST['numero'];

    if ($numero_string && $numero_string >= 0) {
        $numero_sum = str_split($numero_string);

        $suma_total = array_sum($numero_sum);

        echo 'La suma de los dígitos de ' . $numero_string . ' es: ' . $suma_total;
    } else {
        echo 'Por favor, ingrese un número entero positivo válido.';
    }
} else {
    echo 'Acceso no permitido. Por favor, use el formulario para ingresar un número.';
}

?>