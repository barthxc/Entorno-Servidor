<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
</head>

<body>
    <?php
    include('./db.php');
    ?>

    <style>
        .contenedor {
            background-color: gray;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: start;
            gap: 4rem;
        }

        .tienda .carrito {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            align-items: center;
        }

        .contenido-tienda {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-end;
            gap: 1rem;
        }

        .nombre-contenido {
            font-weight: bold;
            font-size: 1rem;
            color: #fff;
        }

        .precio-contenido {
            color: black;
        }

        .botones-contenido button {
            background-color: green;
            color: white;
            cursor: pointer;
        }
    </style>


    <h1>Tienda Super Genial</h1>
    <p>¿Qué quieres comprar?</p>

    <div class="contenedor">
        <div class="tienda">
            <h2>Tienda</h2>

            <?php
            foreach ($productos as $llave => $valor) {
                echo "
                <div class='contenido-tienda'>
                <div class='nombre-contenido'>
                    <p>{$valor['nombre']}</p>
                </div>
                <div class='precio-contenido'>
                    <p>{$valor['precio']}</p>
                </div>
                <div class='acciones-contenido'>
                    <form class='botones-contenido' action='#' method='POST'>
                        <button type='submit' name='añadir' value='valor id'>Añadir</button>
                    </form>
                </div>
            </div>
            ";
            }
            ?>

        </div>

        <div class="carrido">
            <h2>Carrito</h2>
            <p>prueba</p>
            <p>prueba</p>
            <p>prueba</p>
            <p>prueba</p>
            <p>prueba</p>
            <p>prueba</p>

        </div>
    </div>






    <?php
    include('./db.php');

    var_dump($productos);


    ?>
</body>

</html>