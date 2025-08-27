<?php
include("pila.php");
// Iniciamos la sesión para acceder a los datos.
session_start();


echo "<h2>Elementos actuales en la Pila:</h2>";

// Verificamos si hay una pila en la sesión y si no está vacía.
if (isset($_SESSION['pila']) && !$_SESSION['pila']->estaVacia()) {
    // Recuperamos la pila.
    $pila = $_SESSION['pila'];
    
    // Obtenemos el array con todos los elementos.
    $elementos = $pila->mostrar();
    
    echo "<p><strong>(Cima de la pila)</strong></p>";
    echo "<ul>";
    
    // Recorremos el array en orden inverso para mostrarlo como una pila real
    // (el último que entró es el primero que se ve).
    foreach (array_reverse($elementos, true) as $elemento) {
        // Usamos htmlspecialchars para evitar problemas si el usuario inserta código HTML.
        echo "<li>" . htmlspecialchars($elemento) . "</li>";
    }
    echo "</ul>";
    echo "<p><strong>(Fondo de la pila)</strong></p>";
    
} else {
    // Si no hay pila o está vacía, lo indicamos.
    echo "<p>La pila está vacía.</p>";
}
?>

<!-- Enlace para volver al menú -->
<br>
<a href="menu.html">Volver al Menú Principal</a>
