<?php

$servidor = 'localhost';
$usuario = 'root';
$password = '';
$basededatos = 'db_citas_medicas';

$con = mysqli_connect($servidor, $usuario, $password, $basededatos);

if(!$con) {
    die("erro de conexion ") . mysqli_connect_error();
}