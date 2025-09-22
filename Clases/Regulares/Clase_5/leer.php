<?php
$image = imagecreatefrompng();
header("Content-type: image/png");
imagepng($image);

?>