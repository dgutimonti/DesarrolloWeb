<?php
$con= new mysqli("127.0.0.1", "gut", "12548078", "db_desarrolloweb");
if($con->connect_error){
    die ("Conexion fallada".$con->connect_error);
}
?>