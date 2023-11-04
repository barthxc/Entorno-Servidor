<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Condicionales</title>
</head>

<body>
    <h2>Día del Mes</h2>
    <?php
    $dia = date("d");

    echo "<h1>$dia</h1>";

    if ($dia < 10) {
        echo "<p>Activo</p>";
    } else {
        echo "<p>No Activo</p>";
    }
    ?>
    <h2>Número aletorio</h2>
    <?php
    $numero = rand(1, 3);

    if ($numero === 1) {
        echo "<p>uno</p>";
    } elseif ($numero === 2) {
        echo "<p>dos</p>";
    } else {
        echo "<p>tres</p>";
    }
    ?>
    <h2>Número aletorio divisibles y par</h2>
    <?php
    $numeroRandom = rand(1, 20);
    echo $numeroRandom;
    if ($numeroRandom % 2 === 0 && $numeroRandom % 5 === 0) {
        echo "<p>Es par y divisible entre 5</p>";
    } elseif ($numeroRandom % 5 === 0) {
        echo "<p>Solo es divisible entre 5</p>";
    } elseif ($numeroRandom % 2 === 0) {
        echo "<p>Solo es divisible entre 2</p>";
    } else {
        echo "<p>Nada de eso</p>";
    }
    ?>

    <!-- 4. Escribe un programa que ordene tres números enteros generado aleatoriamente.
    5. Generar un valor aleatorio entre 1 y 100. Luego mostrar si tiene 1,2 o 3
    dígitos.
    6. Escribe un programa en que dado un número del 1 a 7 escriba el
    correspondiente nombre del día de la semana -->

</body>

</html>