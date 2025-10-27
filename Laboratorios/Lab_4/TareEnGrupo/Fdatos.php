<?php
include('conexion.php');

$num_alumnos = $_GET['num'];

$sql = "SELECT * FROM carreras";
$result = mysqli_query($con, $sql);

// Fetch all careers into an array first
$carreras = [];
while ($fila_carrera = mysqli_fetch_assoc($result)) {
    $carreras[] = $fila_carrera;
}
?>
<style>
    .content {
        display: block;
        width: 80%;
        height: auto;
        margin: auto;
        border: 2px solid blue;
        background-color: lightblue;
        padding: 50px;
    }
</style>
<div class="content">
    <form action="insertar.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="num_alumnos" value="<?php echo $num_alumnos; ?>" >
        <div>
            <label for="Fotografia">Fotografia</label>
            <label for="Nombres">Nombres</label>
            <label for="Apellidos">Apellidos</label>
            <label for="CU">CU</label>
            <label for="Sexo">Sexo</label>
            <label for="Carrera">Carrera</label>
        </div>
        <?php for($i = 0; $i < $num_alumnos; $i++) {
            ?>
            <div>
                <label for="num"><?php echo $i + 1;?></label>
                <input type="file" name="fotografia[]">
                <input type="text" name="nombres[]">
                <input type="text" name="apellidos[]">
                <input type="text" name="cu[]">
                
                <input type="radio" name="sexo[<?php echo $i; ?>]" value="M" required>M
                <input type="radio" name="sexo[<?php echo $i; ?>]" value="F">F
                
                <select name="codigocarrera[]" required>
                    <?php
                    foreach($carreras as $carrera_row) {
                        ?>
                    <option value="<?php echo $carrera_row['codigo']; ?>"><?php echo $carrera_row['carrera']; ?></option>
                    <?php    
                    }
                    ?>
                </select>
            </div>
        <?php
        }
        ?>
        <br>
        <input type="submit" value="Insertar">
        <input type="reset" value="Borrar">
    </form>
</div>