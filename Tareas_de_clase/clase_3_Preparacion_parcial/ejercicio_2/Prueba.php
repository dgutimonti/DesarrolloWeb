<?php
class Prueba {
    public $item;
    public $color;
    public $color_fondo;
    public $imagen;

    public function __construct($item, $color, $color_fondo, $imagen){
        $this->item = $item;
        $this->color = $color;
        $this->color_fondo = $color_fondo;
        $this->imagen = $imagen;
    }

    public function cuadrado(){
        echo "<div class='cuadrado-container'>";
        echo "<div class='cuadrado' style='background-color: {$this->color_fondo}; color: {$this->color};'>";
        echo "<div class='cuadrado-content' style='background-color: {$this->color};'>";
         if (!empty($this->imagen) && file_exists($this->imagen)) {
            echo "<img src='{$this->imagen}' alt='Imagen subida'>";
        } else {
            echo "<p>No hay imagen disponible</p>";
        }
        echo "</div>";
        echo "<div class='item-text' style='letter-spacing: 3em; padding-left: 1em;'>{$this->item}</div>";
        echo "</div>";
        echo "</div>";
    }
    
    public function diagonal(){
        echo "<div class='diagonal-container'>";
        echo "<table class='diagonal-table'>";
        $letras = str_split($this->item);
        $longitud = count($letras);
        
        for($i = 0; $i < $longitud; $i++){
            echo '<tr>';
            for($j = 0; $j < $longitud; $j++){
                if($i == $j){
                    echo "<td style='background-color: {$this->color_fondo}; color: {$this->color};'>{$letras[$i]}</td>";
                } else {
                    echo "<td class='empty'></td>";
                }
            }
            echo  "</tr>";
        }
        echo "</table>";
        echo "</div>";
    }
}