<?php

$servidor = "localhost";
$usuario = "root";
$password = "";
$db = "bd_recetas";
$con = mysqli_connect($servidor, $usuario, $password, $db);

if(!$con){
    die(" ". mysqli_connect_error());
}

?>