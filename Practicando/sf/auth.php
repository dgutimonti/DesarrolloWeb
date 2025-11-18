<?php
session_start();
include 'db.php';

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['nivel'] = $row['nivel'];
    $_SESSION['usuario'] = $row['usuario'];
    echo json_encode(['success' => true, 'usuario' => $row['usuario'], 'nivel' => $row['nivel']]);
} else {
    echo json_encode(['success' => false]);
}

$conn->close();
?>