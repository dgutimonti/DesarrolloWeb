<?php
/*
-- SQL to create the table
CREATE TABLE libros (
  id INT AUTO_INCREMENT PRIMARY KEY,
  imagen VARCHAR(255),
  titulo VARCHAR(255),
  autor VARCHAR(255),
  editorial VARCHAR(255),
  anio INT
);

-- SQL to insert sample data
INSERT INTO libros (imagen, titulo, autor, editorial, anio) VALUES
('imagen1.jpg', 'Introducción a la Informatica', 'Michael Miller', 'Bolivia', 1966),
('imagen2.jpg', 'Arquitectura de Computadoras', 'Patricio Quiroga', 'Bolivia', 4988),
('imagen3.jpg', 'Curso Android', 'Maestros Web', 'Castellana', 8777);
*/

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "practicando"; // Change to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Sorting logic
$orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : 'titulo';
$order = isset($_GET['order']) && $_GET['order'] == 'desc' ? 'desc' : 'asc';

$sql = "SELECT imagen, titulo, autor, editorial, anio FROM libros ORDER BY $orderBy $order";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Libros</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>

<table>
  <thead>
    <tr>
      <th><a href="?orderBy=imagen&order=<?php echo $order == 'asc' ? 'desc' : 'asc'; ?>">Imagen</a></th>
      <th><a href="?orderBy=titulo&order=<?php echo $order == 'asc' ? 'desc' : 'asc'; ?>">Titulo</a></th>
      <th><a href="?orderBy=autor&order=<?php echo $order == 'asc' ? 'desc' : 'asc'; ?>">Autor</a></th>
      <th><a href="?orderBy=editorial&order=<?php echo $order == 'asc' ? 'desc' : 'asc'; ?>">Editorial</a></th>
      <th><a href="?orderBy=anio&order=<?php echo $order == 'asc' ? 'desc' : 'asc'; ?>">Año</a></th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><img src='" . $row["imagen"] . "' width='100'></td>";
        echo "<td>" . $row["titulo"] . "</td>";
        echo "<td>" . $row["autor"] . "</td>";
        echo "<td>" . $row["editorial"] . "</td>";
        echo "<td>" . $row["anio"] . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='5'>No hay libros</td></tr>";
    }
    $conn->close();
    ?>
  </tbody>
</table>

</body>
</html>
