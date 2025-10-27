<?php
include('conexion.php');

    $num_alumnos = $_POST['num_alumnos'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $cu = $_POST['cu'];
    $sexo = $_POST['sexo'];
    $codigocarrera = $_POST['codigocarrera'];

    for ($i = 0; $i < $num_alumnos; $i++) {
        $fotografia_name = $_FILES['fotografia']['name'][$i];
        $fotografia_tmp = $_FILES['fotografia']['tmp_name'][$i];
        $upload_path = 'img/' . $fotografia_name;

        if (move_uploaded_file($fotografia_tmp, $upload_path)) {
            $stmt = $con->prepare("INSERT INTO Alumnos (fotografia, nombres, apellidos, cu, sexo, codigocarrera) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssi", $upload_path, $nombres[$i], $apellidos[$i], $cu[$i], $sexo[$i], $codigocarrera[$i]);
            $stmt->execute();
        }
    }

$alumnos_query = "SELECT a.fotografia, a.nombres, a.apellidos, a.cu, a.sexo, c.carrera FROM Alumnos a JOIN carreras c ON a.codigocarrera = c.codigo";
$alumnos_result = mysqli_query($con, $alumnos_query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos Insertados</title>
    <style>
        body {
            font-family: sans-serif;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
        }
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
        img {
            width: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Alumnos Registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>Nro</th>
                    <th>Fotografía</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>CU</th>
                    <th>Sexo</th>
                    <th>Carrera</th>
                </tr>
            </thead>
            <tbody>
                <?php $n = 1; while ($row = mysqli_fetch_assoc($alumnos_result)): ?>
                    <tr>
                        <td><?php echo $n++; ?></td>
                        <td><img src="<?php echo $row['fotografia']; ?>" alt="Foto"></td>
                        <td><?php echo $row['nombres']; ?></td>
                        <td><?php echo $row['apellidos']; ?></td>
                        <td><?php echo $row['cu']; ?></td>
                        <td><?php echo $row['sexo']; ?></td>
                        <td><?php echo $row['carrera']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <br>
        <a href="formulario.html">Volver</a>
    </div>
</body>
</html>
