<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de temperatura</title>
</head>
<body>
    <h1>Conversor de Temperatura</h1>
    <form action="logica/conversor.php" method="post">
        <label for="temperatura">Ingresar Temperatura</label>
        <input type="text" name="temperatura">

        <select name="unidad_medida">
            <option value="celsius">Celsius</option>
            <option value="fahrenheit">Fahrenheit</option>
            <option value="kelvin">Kelvin</option>
        </select>
        
        <input type="submit" value="Convertir">
    </form>
</body>
</html>