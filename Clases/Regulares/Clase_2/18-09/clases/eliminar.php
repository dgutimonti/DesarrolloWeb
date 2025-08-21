<?php
// PRIMERO, le decimos a PHP qué es una "Pila".
include("pila.php");

// AHORA, iniciamos la sesión.
session_start();

if (isset($_SESSION['pila'])) {
    $pila = $_SESSION['pila'];
    $elemento_eliminado = $pila->eliminar();
    $_SESSION['pila'] = $pila;
    
    if ($elemento_eliminado !== null) {
        echo "<h1>Elemento '{$elemento_eliminado}' eliminado.</h1>";
    } else {
        echo "<h1>La pila ya está vacía. No se pudo eliminar nada.</h1>";
    }
} else {
    echo "<h1>La pila está vacía. No hay nada que eliminar.</h1>";
}
?>
<br>
<a href="menu.html">Volver al Menú Principal</a>