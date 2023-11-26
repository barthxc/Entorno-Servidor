<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FeedBack - Pablo Bartolomé Gallardo</title>
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

        .formulario-entregado .data {
            margin: 5px 0;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }

        .bold {
            font-weight: bold;
        }

        .rojo {
            color: red;
        }

        .verde {
            padding: 10px;
            color: green;
        }
    </style>
</head>

<body>



    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $telefono = $_POST["telefono"];
        $fecha = $_POST["fecha"];
        $email = $_POST["email"];
        $direccion = $_POST["direccion"];

        $errorNombre = false;
        $errorApellido = false;
        $errorTelefono = false;
        $errorEmail = false;
        $errorDireccion = false;

        if (empty($nombre)) {
            $nombre = "Nombre obligatorio*";
            $errorNombre = true;
        }
        if (empty($apellido)) {
            $apellido = "Apellido obligatorio*";
            $errorApellido = true;
        }
        if (empty($telefono) || !ctype_digit($telefono) || strlen($telefono) !== 9) {
            $telefono = "Teléfono obligatorio y debe tener 9 dígitos numéricos*";
            $errorTelefono = true;
        }
        if (empty($email)) {
            $email = "Email obligatorio*";
            $errorEmail = true;
        }
        if (empty($direccion)) {
            $direccion = "Dirección obligatoria*";
            $errorDireccion = true;
        }
        /*He validado de algunas forma la información he jugado con algunas variables y clases de CSS para añadir algo de estilos intuitivos.
        De esta forma cuando un dato se ha enviado mal. Le cambio el valor por un mensaje de error para mostrarlo y además pongo una variable en TRUE
        Esa variable la valoro en un operador ternario para añadirle la clase ROJO y VERDE para saber si el resultado se ha enviado correctamante.
        De esta forma tengo la capacidad de enviar y validar la información sin tener en cuenta la validación de HTML que es muy fácil de saltar.

        Javier voy a enviar este ejercicio el día 11/11/2023 y te he enviado algunos emails relacionados con el Trabajo de Fin de Grado.
        Espero que me conteste para cuenta veas el FeedBack porfavor.
        Un saludo.
        */
        echo "
        <div class='formulario-entregado'>
            <h1> Formulario entregado correctamente!</h1>
            <p class='bold'>Nombre: </p>
            <p class='data " . ($errorNombre ? 'rojo' : '') . "'>$nombre</p>
            <p class ='bold'>Apellido: </p>
            <p class='data " . ($errorApellido ? 'rojo' : '') . "'>$apellido</p>
            <p class ='bold'>Telefono: </p>
            <p class='data " . ($errorTelefono ? 'rojo' : '') . "'>$telefono</p>
            <p class ='bold'>Fecha: </p>
            <p class = 'data'>$fecha</p>
            <p class ='bold'>Email: </p>
            <p class='data " . ($errorEmail ? 'rojo' : '') . "'>$email</p>
            <p class ='bold'>Direccion: </p>
            <p class='data " . ($errorDireccion ? 'rojo' : '') . "'>$direccion</p>
            " . (!$errorNombre && !$errorApellido && !$errorTelefono && !$errorEmail && !$errorDireccion ? '<p class="verde">Formulario enviado correctamente!</p>' : '') . "
        </div>
        
    ";
    }

    ?>




</body>


</html>