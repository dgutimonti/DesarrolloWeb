<?php

if (isset($_GET['numero'])){
    $numero = $_GET['numero'];

    if ($numero > 0 && $numero % 1 == 0){

        echo '<h2>El numero '.$numero.' es entero positivo</h2>';
        if ($numero % 2 == 0){

            echo '<h3>El numero '.$numero.' es par</h3>';
        }
        else {

            echo '<h3>El numero '.$numero.' es impar</h3>';
        }

    } else {
        echo 'El numero no es entero ni positivo';
    }
}