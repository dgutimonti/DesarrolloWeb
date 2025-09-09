<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo_mostrar.css">
</head>
<body>
    <h1>Datos del Cliente</h1>
    <div class="contenido">
    <div class="name">
        <?php
        $name = $_GET['nombres'];
        echo "Nombres: ".$name;
        ?>
    </div>
    <div class="lastname">
        <?php
        $lastname = $_GET['apellidos'];
        echo "Apellidos: ".$lastname;
        ?>
    </div>
    <div class="sex">
        <?php
        $sex = $_GET['sexo'];
        echo "Sexo: ".$sex;
        ?>
    </div>
    <div class="adress">
        <?php
        $adress = $_GET['direccion'];
        echo "Direccion: ".$adress;
        ?>
    </div>
    <div class="tel">
        <?php
        $tel = $_GET['celular'];
        echo "Celular: ".$tel;
        ?>
    </div>
    <div class="email">
        <?php
        $email = $_GET['correo'];
        echo "Correo: ".$email;
        ?>
    </div>
    </div>
</body>
</html>