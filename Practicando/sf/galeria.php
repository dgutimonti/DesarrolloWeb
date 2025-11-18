<?php
include 'db.php';
$sql = "SELECT * FROM libros";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<img src='img/{$row['portada']}' alt='{$row['titulo']}' onclick='openModal(this)'>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>