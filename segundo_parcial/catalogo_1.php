<?php
include 'conexion.php';
$sql = "SELECT id, fotografia, titulo FROM recetas";
$result = mysqli_query($con, $sql);

echo '<table>';
$contador = 0;
while($row = mysqli_fetch_assoc($result)){
    if($contador % 4 == 0) echo "<tr>";
    echo "<td class='tarjeta-receta'>";
    echo "<img src='images/".$row['fotografia']."' width='120px' height='120px' onclick='abrirModal(".$row['id'].")'>";
    echo "<br><b>".$row['titulo']."</b>";
    echo "</td>";
    if($contador % 4 == 3) echo "</tr>";
    $contador++;
}
echo "</table>";
?>
