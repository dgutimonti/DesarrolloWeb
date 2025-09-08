<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Envíame un mensaje</title>
  <link rel="stylesheet" href="../public/css/enviamemensaje.css">
</head>

<body>
  <header>
    <h1>Envíame un mensaje</h1>
    <?php include("navbar.php");?>
  </header>
  <main>
    <article>
      <h2>Formulario de Contacto</h2>
      <form action="#" method="post">
        <fieldset>
          <legend>Información personal</legend>
          <p>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre completo" required>
          </p>
          <p>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="tu.correo@ejemplo.com" required>
          </p>
        </fieldset>
        <fieldset>
          <legend>Tu mensaje</legend>
          <p>
            <label for="asunto">Asunto:</label>
            <input type="text" id="asunto" name="asunto" placeholder="Ej: Propuesta de proyecto" required>
          </p>
          <p>
            <label for="prioridad">Prioridad:</label>
            <select id="prioridad" name="prioridad">
              <option value="normal">Normal</option>
              <option value="urgente">Urgente</option>
              <option value="baja">Baja</option>
            </select>
          </p>
          <p>
            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje aquí..." required></textarea>
          </p>
        </fieldset>
        <p>
          <button type="submit">Enviar</button>
          <button type="reset">Limpiar</button>
        </p>
      </form>
    </article>
    <aside>
      <h3>Información de Contacto Directo</h3>
      <p>Si prefieres, puedes contactarme a través de los siguientes medios:</p>
      <ul>
        <li><strong>Correo Electrónico:</strong> <a
            href="mailto:daniel.gutierrez@email.com">danielgutierrezmonti@gmail.com</a></li>
        <li><strong>Teléfono:</strong> +591 72890458</li>
      </ul>
    </aside>
  </main>
  <footer>
    <p>Copyright &copy; 2025</p>
  </footer>
</body>

</html>
