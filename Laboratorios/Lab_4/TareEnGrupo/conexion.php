<?php

$con = mysqli_connect('localhost', 'root', '', 'bd_alumnos');

if(mysqli_connect_errno()){
    die('Se produjo un error');
}