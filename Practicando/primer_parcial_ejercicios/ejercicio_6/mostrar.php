<?php
if (isset($_GET['nombre'])  && isset($_GET['ciudad'])){
    $nombre = $_GET['nombre'];
    $ciudad = $_GET['ciudad'];
    echo '<h2>El nombre es: <strong>'.$nombre.'</strong></h2>';
    echo '<h2 style="color: red;">La ciudad es: '.$ciudad.'</h2>';
}