<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <div>
      <h1>Ejercicio FeedbackUd3 - Pablo Bartolomé Gallardo</h1>
      	<!--- Si levantas el servidor usando php -S localhost:3000 no te funcionará si tu archivo HTML no es llamado como index.html-->
        <?php


?>
      <form action="registros.php" method="POST">
        <div>
          <label for="nombre">Nombre:</label>
          <input
            type="text"
            id="nombre"
            name="nombre"
            placeholder="Pablo"
            required
          />
        </div>

        <div>
          <label for="apellido">Apellido:</label>
          <input
            type="text"
            id="apellido"
            name="apellido"
            placeholder="Bartolomé"
            required
          />
        </div>

        <div>
          <label for="telefono">Teléfono:</label>
          <input
            type="tel"
            id="telefono"
            name="telefono"
            placeholder="123123123"
            required
          />
        </div>

        <div>
          <label for="fecha">Fecha:</label>
          <input
            type="date"
            name="fecha"
            id="fecha"
            placeholder="12-20-20"
            required
          />
        </div>

        <div>
          <label for="email">Email:</label>
          <input
            type="email"
            name="email"
            id="email"
            placeholder="correo@correo.com"
            required
          />
        </div>

        <div>
          <label for="direccion">Dirección:</label>
          <textarea name="direccion" id="direccion" required></textarea>
        </div>

        <div>
          <button type="submit" value="Enviar">Enviar</button>
          <button type="reset">Borrar</button>
        </div>
      </form>
    </div>

  </body>

  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
    }

    form {
      width: 100%;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      background-color: #f9f9f9;
    }

    form div {
      margin-bottom: 15px;
    }

    form label {
      display: block;
      font-weight: bold;
    }

    form input,
    form textarea {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    form button {
      padding: 10px 20px;
      margin-right: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    form button:first-child {
      background-color: #007bff;
      color: #fff;
    }

    form button:last-child {
      background-color: #ccc;
    }
  </style>
</html>
