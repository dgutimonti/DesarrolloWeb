<?php

class Pizarra
{
    public $palabra;
    public $color;
    public $color_fondo;

    public function __construct($palabra, $color, $color_fondo)
    {
        $this->palabra = $palabra;
        $this->color = $color;
        $this->color_fondo = $color_fondo;
    }

    public function cuadrado()
    {
        $palabra = $this->palabra;
        $n = strlen($palabra);
        $matriz = array_fill(0, $n, array_fill(0, $n, ''));

        for ($j = 0; $j < $n; $j++) {
            $matriz[0][$j] = $palabra[$j];
        }

        for ($j = 0; $j < $n; $j++) {
            $matriz[$n - 1][$j] = $palabra[$n - 1 - $j];
        }

        for ($i = 1; $i < $n - 1; $i++) {
            $matriz[$i][0] = $palabra[$i];
        }

        for ($i = 1; $i < $n - 1; $i++) {
            $matriz[$i][$n - 1] = $palabra[$n - 1 - $i];
        }

        echo "<table border='0' style='border-collapse: collapse;'>";
        for ($i = 0; $i < $n; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $n; $j++) {
                if ($matriz[$i][$j] !== '') {
                    echo "<td style='width: 30px; height: 30px; text-align: center; background-color: {$this->color_fondo}; color: {$this->color};'>" . $matriz[$i][$j] . "</td>";
                } else {
                    echo "<td style='width: 30px; height: 30px;'></td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}

if (isset($_GET['op']) && $_GET['op'] == 'cuadrado') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $palabra = $_POST['palabra'];
        $color = $_POST['color'];
        $color_fondo = $_POST['color_fondo'];
    } else {
        $palabra = isset($_GET['palabra']) ? $_GET['palabra'] : 'examen';
        $color = isset($_GET['color']) ? '#' . $_GET['color'] : '#ffffff';
        $color_fondo = isset($_GET['color_fondo']) ? '#' . $_GET['color_fondo'] : '#000000';
    }

    $pizarra = new Pizarra($palabra, $color, $color_fondo);
    $pizarra->cuadrado();
}

?>
<br>
<a href="ejercicio3.php">Volver</a>
