<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mis Amigos</title>
  <link rel="stylesheet" href="../public/css/misamigos.css">
</head>

<body>
  <header>
    <h1>Mis Amigos</h1>
    <?php include("navbar.php");?>
  </header>
  <main>
    <article>
      <h2>Amistades que valen oro</h2>
      <p>Tengo la suerte de contar con un grupo de amigos increíble. Somos <strong>19 en total</strong>, una verdadera
        hermandad. Nos conocemos desde hace muchísimos años, por lo que nuestra amistad es a prueba de todo.</p>
      <p>Nuestras reuniones son legendarias. Cada viernes por la noche, nos juntamos para jugar al póker, una tradición
        que nos une y nos regala momentos inolvidables. Además, comparto mi pasión por el kickboxing con algunos de
        ellos, lo que fortalece aún más nuestros lazos.</p>

      <section>
        <h3>El Grupo</h3>
          <table>
            <thead>
              <tr>
                <td>Nombre</td>
                <td>Apellidos</td>
                <td>Numero</td>
                <td>Correo</td>
                <td>Opciones</td>
              </tr>
            </thead>
            <tbody>
              <?php
              include_once("../controller/AmigoController.php");

              $amigoController = new AmigoController($con);

              $result = $amigoController->obtenerAmigos();

              while ($row=mysqli_fetch_array($result)) {
              ?>
                <tr>
                  <td><?php echo $row['nombre']; ?></td>
                  <td><?php echo $row['apellidos']; ?></td>
                  <td><?php echo $row['celular']; ?></td>
                  <td><?php echo $row['correo']; ?></td>
                  <td>
                    <a href="forms/formActualizarAmigo.php?id=<?php echo $row['id']; ?>">Editar</a>
                    <a href="../controller/AmigoController.php?action=delete&id=<?php echo $row['id']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este amigo?');">Eliminar</a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
          <a href="forms/formInsertar.php">Agregar Amigo</a>
     </section>

      <section>
        <h3>Galería de Momentos</h3>
        <figure>
          <img src="../public/img/poker.png" alt="Foto con amigos 1">
          <figcaption>Una noche de póker.</figcaption>
        </figure>
        <figure>
          <img src="../public/img/kickboxing.jpg" alt="Foto con amigos 2">
          <figcaption>Entrenando kickboxing.</figcaption>
        </figure>
      </section>

      <blockquote>
        <p>"La amistad duplica las alegrías y divide las angustias por la mitad." - Francis Bacon</p>
      </blockquote>
    </article>
  </main>
  <footer>
    <p>Copyright &copy; 2025</p>
  </footer>
</body>

</html>
