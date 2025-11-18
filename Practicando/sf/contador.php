<?php
$visitas = 1;
if (isset($_COOKIE['visitas'])) {
    $visitas = $_COOKIE['visitas'] + 1;
}
setcookie('visitas', $visitas, time() + (86400 * 30)); // 86400 = 1 day
echo $visitas;
?>