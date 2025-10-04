<?php
$operacion = $_POST['operacion'];
$n = intval($_POST['n']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $operacion; ?></title>
    <style>
        h1{
            text-align: center;
            color: black;
        }
        table {
            border-collapse: collapse;
            margin: 30px 70px;
        }
        th {
            border: 1px solid #F79646;
            padding: 8px 40px;
            background-color: #F79646;
            color: white;
        }
        td {
            border: 1px solid #F79646;
            padding: 8px 40px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Tabla de <?php echo $operacion; ?></h1>
    <table>
        <tr>
            <th></th>
            <?php
            for ($i = 1; $i <= $n; $i++) {
                echo "<th>$i</th>";
            }
            ?>
        </tr>
        <?php
        for ($i = 1; $i <= $n; $i++) {
            echo "<tr>";
            echo "<th style='color: black;'>$i</th>";
            for ($j = 1; $j <= $n; $j++) {
                $resultado = 0;
                switch ($operacion) {
                    case 'Suma':
                        $resultado = $i + $j;
                        break;
                    case 'Resta':
                        $resultado = $i - $j;
                        break;
                    case 'Multiplicacion':
                        $resultado = $i * $j;
                        break;
                    case 'Division':
                        if ($j != 0) {
                            $resultado = $i / $j;
                        } else {
                            $resultado = 'Inf';
                        }
                        break;
                }
                echo "<td>$resultado</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>