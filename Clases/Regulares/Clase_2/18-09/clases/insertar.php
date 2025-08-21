<?php
// PRIMERO, le decimos a PHP qué es una "Pila".
include("pila.php");

// AHORA, iniciamos la sesión.
session_start();

// La lógica para crear o recuperar la pila de la sesión es la misma.
if (!isset($_SESSION['pila'])) {
    $_SESSION['pila'] = new Pila();
}
$pila = $_SESSION['pila'];

// Verificamos que el formulario nos envió el dato usando el método POST.
if (isset($_POST['elemento']) && $_POST['elemento'] !== '') {
    $elemento_a_insertar = $_POST['elemento'];
    $pila->insertar($elemento_a_insertar);
    $_SESSION['pila'] = $pila;
    echo "<h1>Elemento '{$elemento_a_insertar}' insertado correctamente.</h1>";
} else {
    echo "<h1>No se proporcionó ningún elemento para insertar.</h1>";
}
?>
<br>
<a href="frm_insertar.html">Insertar otro elemento</a>
<br>
<a href="menu.html">Volver al Menú Principal</a>
