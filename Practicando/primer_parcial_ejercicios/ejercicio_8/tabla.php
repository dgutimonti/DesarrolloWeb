
<?php

if (isset($_GET['filas']) && isset($_GET['columnas'])) {
    // Convertir los valores a números enteros
    $numFilas = intval($_GET['filas']);
    $numColumnas = intval($_GET['columnas']);

    // Validar que los números sean positivos
    if ($numFilas > 0 && $numColumnas > 0) {
        
        echo "<h2>Tabla de Multiplicar de {$numFilas}x{$numColumnas}</h2>";
        echo "<table border='1' style='border-collapse: collapse; text-align: center;'>";

        // Bucle para las filas (de 0 a numFilas para incluir la cabecera)
        for ($i = 0; $i <= $numFilas; $i++) {
            echo "<tr>"; // Inicia una nueva fila

            // Bucle para las columnas (de 0 a numColumnas para incluir la cabecera)
            for ($j = 0; $j <= $numColumnas; $j++) {
                
                // Estilo para las celdas de cabecera
                $headerStyle = "style='background-color: #cccccc; font-weight: bold; padding: 5px;'";
                $cellStyle = "style='padding: 5px;'";

                if ($i == 0 && $j == 0) {
                    // Esquina superior izquierda (vacía)
                    echo "<td $headerStyle>x</td>";
                } elseif ($i == 0) {
                    // Primera fila (cabecera de columnas)
                    echo "<td $headerStyle>$j</td>";
                } elseif ($j == 0) {
                    // Primera columna (cabecera de filas)
                    echo "<td $headerStyle>$i</td>";
                } else {
                    // Celda de datos con la multiplicación
                    $resultado = $i * $j;
                    echo "<td $cellStyle>$resultado</td>";
                }
            }
            echo "</tr>"; // Cierra la fila
        }
        echo "</table>"; // Cierra la tabla
    } else {
        echo "Por favor, ingrese un número de filas y columnas válido (mayor que cero).";
    }
} else {
    echo "Por favor, envíe los datos desde el formulario.";
}
?>