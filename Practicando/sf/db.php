<?php
$conn = new mysqli('localhost', 'root', '', 'biblioteca');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>