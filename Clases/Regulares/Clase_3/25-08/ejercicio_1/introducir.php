<form action="sumar.php" method="post">
<?php
$n = $_GET['n'];
for ($i = 0; $i < $n; $i++){
    echo '<input type="number" name="sumando'.$i.'"><br>';
}
?>
<input type="hidden" name="n" value="<?php echo $n ?>">
<input type="submit" value="Sumar">
</form>
