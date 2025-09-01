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
    <article>
      <h2>Pasiones que me definen</h2>
      <p>Mis hobbies son una parte fundamental de mi vida. Me permiten crecer, aprender y desconectar de la rutina.
        Estos son algunos de ellos:</p>

      <section>
        <h3>Mis Actividades Preferidas</h3>
        <table border="1">
          <thead>
            <tr>
              <th>Hobby</th>
              <th>Descripción</th>
              <th>Beneficios</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Kickboxing</td>
              <td>Deporte de contacto y disciplina.</td>
              <td>Autocontrol, respeto y superación.</td>
            </tr>
            <tr>
              <td>Tenis</td>
              <td>Juego de estrategia y agilidad.</td>
              <td>Competencia sana y camaradería.</td>
            </tr>
            <tr>
              <td>Programación</td>
              <td>Creación de soluciones a través del código.</td>
              <td>Aprendizaje continuo y desarrollo de la lógica.</td>
            </tr>
          </tbody>
        </table>
      </section>

      <section>
        <h3>Galería de Hobbies</h3>
        <figure>
          <img src="../public/img/kick.jpeg" alt="Practicando Kickboxing">
          <figcaption>Entrenamiento de Kickboxing.</figcaption>
        </figure>
        <figure>
          <img src="../public/img/tenis.jpg" alt="Jugando Tenis">
          <figcaption>Un partido de tenis.</figcaption>
        </figure>
        <figure>
          <img src="../public/img/programacion.png" alt="Programando">
          <figcaption>Desarrollando un proyecto personal.</figcaption>
        </figure>
      </section>

    </article>
  </main>
  <footer>
    <p>Copyright &copy; 2025</p>
  </footer>
</body>

</html>
