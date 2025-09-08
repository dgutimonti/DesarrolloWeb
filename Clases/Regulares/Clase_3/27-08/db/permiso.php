<?php
if ($_SESSION['rol'] == 'admin'){
    ?>
    <meta http-equiv="refresh" content="2;url=read.php">
    <?php
    die("usted no est autorizadoa realizar esta operacion");
}?>