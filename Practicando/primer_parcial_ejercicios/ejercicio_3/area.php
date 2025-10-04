<?php
if (isset($_GET['base']) && isset($_GET['altura'])) {
    $base = $_GET['base'];
    $altura = $_GET['altura'];
    $area = ($base * $altura)/2;
    echo "<h2>Calulo del Area</h2>";
    echo "<p>Base: " .$base. "</p>";
    echo "<p>Altura: " .$altura. "</p>";
    echo "<h3>El area es de: " . $area ."</h3>";
} else {
    echo "Error";
}
?>

