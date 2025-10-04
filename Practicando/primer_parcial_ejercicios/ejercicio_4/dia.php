<?php

if (isset($_GET['numeroDia'])){
    $numeroDiaSeleccionado = $_GET['numeroDia'];
    $listaDias = ['Lunes', 'Martes', "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];

    // Inicia la etiqueta select
    echo '<select name="numeroDia" id="dia-select">';

    // Recorre la lista de días para crear cada opción
    foreach ($listaDias as $index => $dia) {
        // El valor del día será el índice + 1 (para que sea de 1 a 7)
        $valorDia = $index + 1;
        
        // Comprueba si este es el día que se seleccionó en el formulario.
        // Si es así, la variable $seleccionado valdrá 'selected', si no, estará vacía.
        $seleccionado = ($valorDia == $numeroDiaSeleccionado) ? 'selected' : '';

        // Imprime la etiqueta <option> con el valor y el atributo 'selected' si corresponde
        echo "<option value='$valorDia' $seleccionado>$dia</option>";
    }

    // Cierra la etiqueta select
    echo "</select>";
} else {
    // Mensaje por si se accede al archivo sin datos
    echo "Por favor, selecciona un día desde el formulario.";
}
?>