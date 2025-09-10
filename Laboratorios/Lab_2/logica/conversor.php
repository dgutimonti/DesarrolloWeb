<?php

class Conversor {
    public $temperatura;
    public $unidad_medida;

    public function __construct($temperatura, $unidad_medida) {
        $this->temperatura = $temperatura;
        $this->unidad_medida = $unidad_medida;
    }

    public function convertir() {
        if ($this->unidad_medida == 'celsius') {

            return $this->temperatura + 273.15;

        } else if ($this->unidad_medida == 'fahrenheit'){

            return ($this->temperatura - 32) * 5/9; 

        } else if ($this->unidad_medida == 'kelvin'){

            return $this->temperatura - 273.15; 

        }
        return null;
    }

    public function celsiusAFahrenheit($celsius) {
        return ($celsius * 9/5) + 32;
    }

    public function celsiusAKelvin($celsius) {
        return $celsius + 273.15;
    }

    public function mostrar_tablas() {
        echo "<h2>Tabla de Conversión</h2>";
        echo "<table style='border: 2px solid green; background-color: white;'>
                <tr>
                    <th>Temperatura Original ({$this->unidad_medida})</th>
                    <th>Celsius (°C)</th>
                    <th>Fahrenheit (°F)</th>
                    <th>Kelvin (K)</th>
                </tr>";

            $celsius = $this->convertir(); 

            if ($this->unidad_medida == 'celsius') {
                
                $fahrenheit = $this->celsiusAFahrenheit($this->temperatura);
                $kelvin = $this->celsiusAKelvin($this->temperatura);
                $original_celsius = $this->temperatura;
            } elseif ($this->unidad_medida == 'fahrenheit') {
                $fahrenheit = $this->temperatura;
                $kelvin = $this->celsiusAKelvin($celsius);
                $original_celsius = $celsius;
            } elseif ($this->unidad_medida == 'kelvin') {
                $fahrenheit = $this->celsiusAFahrenheit($celsius);
                $kelvin = $this->temperatura;
                $original_celsius = $celsius;
            }

            echo "<tr>
                    <td>{$this->temperatura}</td>
                    <td>" . round($original_celsius, 2) . "</td>
                    <td>" . round($fahrenheit, 2) . "</td>
                    <td>" . round($kelvin, 2) . "</td>
                  </tr>";
        
        echo "</table>";
    }
}

$temperatura = $_POST['temperatura'];
$unidad_medida = $_POST['unidad_medida'];

if ($temperatura && $unidad_medida) {
    $conversor = new Conversor($temperatura, $unidad_medida);
    $conversor->mostrar_tablas();
}