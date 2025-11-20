<?php
include 'conexion.php';
$sql = "SELECT id, fotografia, titulo, preparacion FROM recetas";
$result = mysqli_query($con, $sql);

echo '<table>';
$contador = 0;
while($row = mysqli_fetch_assoc($result)){
    if($contador % 3 == 0) echo "<tr>";
    echo "<td>";
    echo "<img src='images/".$row['fotografia']."' width='120px' height='120px' onclick=\"abrirModal(".$row['id'].")\">";
    echo "<br><b>".$row['titulo']."</b>";
    echo "<br><button onclick=\"alert('".$row['preparacion']."')\">Ver preparación</button>";
    echo "</td>";
    if($contador % 3 == 2) echo "</tr>";
    $contador++;
}
echo "</table>";
?>


