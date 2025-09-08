<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mis Hobbies</title>
  <link rel="stylesheet" href="../public/css/mishobbies.css">
</head>

<body>
  <header>
    <h1>Mis Hobbies</h1>
    <?php include("navbar.php");?>
  </header>
  <main>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?>
    <article>
      <h2>Pasiones que me definen</h2>
      <p>Mis hobbies son una parte fundamental de mi vida. Me permiten crecer, aprender y desconectar de la rutina.
        Estos son algunos de ellos:</p>

      <section>
        <h3>Mis Actividades Preferidas</h3>
        <a href="forms/formInsertarHobby.php">Agregar Hobby</a>
        <table border="1">
          <thead>
            <tr>
              <th>ID</th>
              <th>Fotografía</th>
              <th>Nombres</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include '../model/Conexion.php';
            $sql = "SELECT * FROM hobbies";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td><img src=\"../public/img/" . $row["fotografia"] . "\" width='100'></td>";
                    echo "<td>" . $row["nombres"] . "</td>";
                    echo "<td><a href=\"forms/formActualizarHobby.php?id=" . $row["id"] . "\">Editar</a> | <a href=\"../controller/HobbyController.php?action=delete&id=" . $row["id"] . "\">Eliminar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No hay hobbies registrados</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </section>
    </article>
    <?php
    } else {
        echo "<p>Por favor, inicie sesión para ver sus hobbies.</p>";
    }
    ?>
  </main>
  <footer>
    <p>Copyright &copy; 2025</p>
  </footer>
</body>

</html>