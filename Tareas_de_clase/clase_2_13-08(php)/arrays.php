<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<?php
    $vocales = array("a", "e", "i", "o", "u");
    for($i = 0; $i < count($vocales); $i++) {
        echo "Vocal: " . $vocales[$i] . "<br>";
    }


?>
<h2>Ciclo foreach con indices</h2>
<?php
    $vocales = array("a", "e", "i", "o", "u");
    foreach($vocales as $indice => $vocal) {
        echo "Indice: $indice, Vocal: $vocal <br>";
    }
    ?>
</body>
</html>