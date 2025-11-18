<?php
include 'db.php';
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$genero = $_POST['genero'];
$anio = $_POST['anio'];

$sql = "UPDATE libros SET titulo = '$titulo', autor = '$autor', genero = '$genero', anio = '$anio' WHERE id_libro = $id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>