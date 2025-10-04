

<?php
include ('conexion.php');
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM libros WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $delete_id);
    if ($stmt->execute()) {
        header("Location: pregunta5.php");
        exit();
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
}

$sql = "SELECT 
            l.id,
            l.imagen,
            l.titulo, 
            l.autor, 
            e.editorial, 
            l.anio
        FROM libros l
        JOIN editoriales e ON l.ideditorial = e.id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros de la Biblioteca</title>
    <style>

        table {
            width: 50%;
            border-collapse: collapse;
            margin:auto;
        }
        th {
            background-color: #4777b1ff;
            color: white;
            border: 1px solid #95B3D7;
        } 
        td {
            border: 1px solid #95B3D7;
            text-align: left;
            padding: 8px;
            vertical-align: middle;
        }
        .book-image {
            height: 80px;
            width: auto;
        }
        .delete-link {
            background-color: yellow;
            text-decoration: none;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th>Imagen</th>
        <th>Título</th>
        <th>Autor</th>
        <th>Editorial</th>
        <th>Año</th>
        <th>Operación</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
                echo "<td><img src='images/" . $row["imagen"] . "' alt='" . $row["titulo"] . "' class='book-image'></td>";
                echo "<td>" . $row["titulo"] . "</td>";
                echo "<td>" . $row["autor"] . "</td>";
                echo "<td>" . $row["editorial"] . "</td>";
                echo "<td>" . $row["anio"] . "</td>";
                echo "<td><a href='pregunta5.php?delete_id=" . $row["id"] . "' class='delete-link'>Eliminar</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No se encontraron resultados</td></tr>";
    }
    $conn->close();
    ?>
</table>

</body>
</html>