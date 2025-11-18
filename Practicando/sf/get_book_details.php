<?php
include 'db.php';
$id = $_GET['id'];
$sql = "SELECT * FROM libros WHERE id_libro = $id";
$result = $conn->query($sql);
$book = $result->fetch_assoc();
echo json_encode($book);
$conn->close();
?>