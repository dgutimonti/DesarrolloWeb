<?php 
include_once ("../model/Conexion.php");
class AmigoController {
    private $con;
    function __construct($conexion) {
        $this->con = $conexion;
    }

    function obtenerAmigos() {
        $sql="SELECT id, nombre, apellidos, celular, correo FROM amigos";
        $result=$this->con->query($sql);
        return $result;
    }

    function obtenerAmigoPorId($id){
        $sql = "SELECT id, nombre, apellidos, celular, correo FROM amigos WHERE id = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc(); 
    }

    function insertarAmigo($nombre, $apellidos, $celular, $correo) {
        $sql = "INSERT INTO amigos(nombre, apellidos, celular, correo) VALUES (?, ?, ?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ssss", $nombre, $apellidos, $celular, $correo);
        return $stmt->execute();
    }

    function eliminarAmigo($id){
        $sql="DELETE FROM amigos WHERE id=?";
        $stmt=$this->con->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    function editarAmigo($id, $nombre, $apellidos, $celular, $correo){
        $sql="UPDATE amigos SET nombre=?, apellidos=?, celular=?, correo=? WHERE id=?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ssssi", $nombre, $apellidos, $celular, $correo, $id);
        return $stmt->execute();
    }


}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre']) && !isset($_POST['id'])) {
    $controller = new AmigoController($con);
    $controller->insertarAmigo($_POST['nombre'], $_POST['apellidos'], $_POST['celular'], $_POST['correo']);
    header("Location: ../view/misamigos.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $controller = new AmigoController($con);
    $controller->eliminarAmigo($_GET['id']);

    header("Location: ../view/misamigos.php");
    exit(); 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

    $controller = new AmigoController($con);
    $controller->editarAmigo($_POST['id'], $_POST['nombre'], $_POST['apellidos'], $_POST['celular'], $_POST['correo']);
    header("Location: ../view/misamigos.php");
    exit();
}
