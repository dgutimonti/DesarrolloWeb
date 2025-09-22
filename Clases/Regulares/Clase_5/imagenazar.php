<?php
$arreglo = array("img/escudo_usfx.png", "img/laravel.png", "img/yii.png");
$clave = array_rand($arreglo);
$ruta_imagen = $arreglo[$clave];
$imagen = imagecreatefrompng($ruta_imagen);
header("Content-type: image/png");
imagepng($imagen);
imagedestroy($imagen);
?>