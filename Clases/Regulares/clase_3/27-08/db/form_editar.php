<body>
    <?php
    <form action="" method="post">
        <div>
            <label for="nombres">Ingresar nombre</label>
            <input type="text" name="nombres" id="">
        </div>
        <div>
            <label for="apellidos">Ingresar apellidos</label>
            <input type="text" name="apellidos" id="">
        </div>
        <div>
            <label for="sexo">Sexo</label>
            <select name="sexo" id="">
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
        </div>
        <div>
            <label for="numero_documento">Ingrese su numero de documento</label>
            <input type="text" name="numero_documento" id="">
        </div>
        <div>
            <input type="submit" value="Enviar">
        </div>
    </form>
    <a href="insert.php">insertar</a>
</body>