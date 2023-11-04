<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .formulario-entregado {
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            text-align: center;
        }

        .formulario-entregado h1 {
            margin-bottom: 20px;
        }

        .formulario-entregado p {
            margin: 5px 0;
            font-weight: bold;
        }
    </style>
  </head>
  <body>




<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $fecha = $_POST["fecha"];
    $email = $_POST["email"];
    $direccion = $_POST["direccion"];


    echo "
        <div class='formulario-entregado'>
        <h1> Formulario entregado correctamante!</h1>
            <p>Nombre: </p>
            <p>$nombre</p>
            <p>Apellido: </p>
            <p>$apellido</p>
            <p>Telefono: </p>
            <p>$telefono: </p>
            <p>Fecha: </p>
            <p>$fecha</p>
            <p>Email: </p>
            <p>$email: </p>
            <p>Direccion: </p>
            <p>$direccion: </p>
        </div>
    ";
}

?>



</body>


</html>