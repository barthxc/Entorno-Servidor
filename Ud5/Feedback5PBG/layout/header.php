<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FB5 | PBG</title>
    <style>
        header {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        nav {
            display: flex;
            justify-content: center;
        }

        ul {
            display: flex;
            justify-content: space-evenly;
            gap: 4rem;
            list-style: none;
            font-size: 2rem;
        }

        a {
            text-decoration: none;
            color: black;
            text-align: center;
        }

        a:hover {
            font-weight: bold;
            color: purple;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 4px;
            width: 300px;
        }

        h2 {
            text-align: center;
        }

        .form-div {
            display: flex;
            justify-content: center;
        }

        .error {
            color: red;
            text-align: center;
            font-weight: bold;

        }

        .success {
            color: green;
            text-align: center;
            font-weight: bold;
        }

        .alerta {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>
</head>

<body>
    <?php include('../bd/bd.php');
    session_start();

    ?>

    <header>
        <nav>
            <ul>
                <li><a href="../paginas/index.php">Inicio</a></li>
                <?php
                // Verifica si el usuario está logeado
                if (isset($_SESSION['usuario'])) {
                    echo '<li><a href="../paginas/perfil.php">Perfil</a></li>';
                } else {
                    // Si no está logeado, muestra los enlaces de Login y Registro
                    echo '<li><a href="../paginas/login.php">Login</a></li>';
                    echo '<li><a href="../paginas/registro.php">Registro</a></li>';
                }
                ?>
            </ul>
        </nav>
        <p>Bienvenido: <?php echo isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Invitado'; ?></p>
        <?php
        if (isset($_SESSION['usuario'])) {
            echo '
            <form method="post" action="index.php">
                <button type="submit" name="logout">Cerrar Sesión</button>
            </form>';
        }
        ?>

    </header>