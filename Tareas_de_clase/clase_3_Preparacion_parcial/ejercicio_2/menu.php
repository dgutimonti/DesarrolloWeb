<?php
require_once 'Prueba.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item = $_POST['item'];
    $color = $_POST['color'];
    $color_fondo = $_POST['color_fondo'];

    $imagen_path = '';
    if (isset($_FILES['imagen']['name']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nombre_archivo = $_FILES['imagen']['name'];
        $nombre_temporal = $_FILES['imagen']['tmp_name'];
        $extension = explode(".", $nombre_archivo);
        $nombre_nuevo = uniqid() . "." . end($extension);
        
        $ruta_completa = __DIR__ . "/uploads/" . $nombre_nuevo;
        if (copy($nombre_temporal, $ruta_completa)) {
            $imagen_path = "uploads/" . $nombre_nuevo;
            
            if (file_exists($ruta_completa)) {
                chmod($ruta_completa, 0644); 
            }
        }
    }

    $prueba = new Prueba($item, $color, $color_fondo, $imagen_path);
    $_SESSION['prueba'] = $prueba;

    header('Location: menu.php?opcion=cuadrado');
    exit();
}

$prueba = isset($_SESSION['prueba']) ? $_SESSION['prueba'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Menu</h1>
        <div class="menu-options">
            <a href="?opcion=cuadrado">Cuadrado</a>
            <a href="?opcion=diagonal">Diagonal</a>
        </div>

        <?php
        if(isset($_GET['opcion']) && $prueba){
            $opcion = $_GET['opcion'];
            if($opcion === 'cuadrado'){
                $prueba->cuadrado();
            } elseif($opcion === 'diagonal'){
                $prueba->diagonal();
            }
        }
        ?>
    </div>
</body>
</html>