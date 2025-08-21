<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos de Funciones de Cadena en PHP</title>
</head>
<body>
    <?php
    $cadena = "123456";
    echo strlen($cadena) . "<br>"; // Longitud de la cadena
    $palabras = explode(" ", "Esto es una prueba");
    foreach ($palabras as $palabra) 
    {

        echo $palabra . "<br>"; // imprime una palabra por linea
    }
    $unido= implode(" ", $palabras);
    echo $unido . "<br>"; // Une las palabras con un espacio
    $resultado = sprintf("8x5 = %d <br>", 8*5);
    echo $resultado . "<br>";
    echo substr("Devuelve una subcadena de otra",9 ,3). "<br><br>";
    if (chop("Cadena \n\n") == "Cadena")
        echo "Iguales<br><br>";
    echo strpos("Busca la palabra dentro de la frase", "palabra") . "<br><br>";
    echo str_replace("verde", "rojo", "Un pez de color verde, como es la hierba.") . "<br>";

    ?>
</body>
</html>