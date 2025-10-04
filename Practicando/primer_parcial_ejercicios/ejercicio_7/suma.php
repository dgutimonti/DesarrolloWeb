<?php

if (isset($_GET['numero1']) && isset($_GET['numero2'])){
    $numero1 = $_GET['numero1'];
    $numero2 = $_GET['numero2'];
    $suma = $numero1 + $numero2;
    echo "<table style='border:1px solid black; border-collapse: collapse;'>";
    echo "<tr style='background:green; color:black;'>";
     echo "<td style='border:1px solid black; padding-right:20px;'>".$numero1."</td>";
     echo "<td style='border:1px solid black; padding-right:20px;'>+</td>";
     echo "<td style='border:1px solid black; padding-right:20px;'>".$numero2."</td>";
     echo "<td style='border:1px solid black; padding-right:20px;'>=</td>";
     echo "<td style='border:1px solid black; padding-right:20px;'>".$suma."</td>";
    echo "</tr>";
    echo "</table>";
}
?>