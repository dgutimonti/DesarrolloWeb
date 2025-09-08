<?php
include '../model/Conexion.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'delete') {
        $id = $_GET['id'];
        $sql = "DELETE FROM hobbies WHERE id = $id";
        if ($con->query($sql) === TRUE) {
            header('Location: ../view/mishobbies.php');
        } else {
            echo "Error al eliminar el hobby: " . $con->error;
        }
    }
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    if ($action == 'insert') {
        $nombres = $_POST['nombres'];
        $fotografia = $_FILES['fotografia']['name'];
        $target = "../public/img/" . basename($fotografia);

        $sql = "INSERT INTO hobbies (nombres, fotografia) VALUES ('$nombres', '$fotografia')";
        if ($con->query($sql) === TRUE) {
            if (move_uploaded_file($_FILES['fotografia']['tmp_name'], $target)) {
                header('Location: ../view/mishobbies.php');
            } else {
                echo "Error al subir la imagen";
            }
        } else {
            echo "Error al insertar el hobby: " . $con->error;
        }
    } elseif ($action == 'update') {
        $id = $_POST['id'];
        $nombres = $_POST['nombres'];
        $fotografia = $_FILES['fotografia']['name'];

        if (!empty($fotografia)) {
            $target = "../public/img/" . basename($fotografia);
            $sql = "UPDATE hobbies SET nombres = '$nombres', fotografia = '$fotografia' WHERE id = $id";
            if (move_uploaded_file($_FILES['fotografia']['tmp_name'], $target)) {
                // File uploaded successfully
            } else {
                echo "Error al subir la imagen";
            }
        } else {
            $sql = "UPDATE hobbies SET nombres = '$nombres' WHERE id = $id";
        }

        if ($con->query($sql) === TRUE) {
            header('Location: ../view/mishobbies.php');
        } else {
            echo "Error al actualizar el hobby: " . $con->error;
        }
    }
}
?>