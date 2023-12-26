<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>FEEDBACK Ud2 - Pablo Bartolomé</h1>
    <h2>“PHP es el lenguaje de programación de entorno servidor”</h2>


    <?php
    $frase = 'PHP es el lenguaje de programación de entorno servidor';
    $palabra = 'programación';
    $validar = false;
    /*Para saber la posición de la palabra 'programación' podemos hacerlo de 2 formas distintas como resumen siempre y cuando se sepa lo que se pida.
    Uno de las soluciones es buscar la palabra 'programacion' usando el método.
    De esta forma obtendremos el resultado de la posición 22 que sería el resultado de la primera ocurrencia de la letra P de la palabra programación
    
    La segunda solución sería usar explode para separar un string por espacios y almacenarlos en una variable la cual sería un array.
    Lo recorreríamos con un condicional para saber si el resultado del valor de la posición del array es 'programacion' y mostramos la posición
    */
    $pos = strripos($frase, $palabra);
    $fraseNueva = str_replace('entorno servidor', 'DES', $frase);
    echo "<h3>Posición de la palabra 'Programación' : </h3>";
    echo "<h1>Solución 1: </h1><br>";
    echo "<p>Posicion de la palabra programación: $pos </p>";


    echo "<h1>Solución 2: </h1><br>";
    //Aquí hemos almacenado las palabras en un array
    $arrayFrase = explode(" ", $frase);
    foreach ($arrayFrase as $indice => $palabraArray) {
        if ($palabra === 'programación') {
            echo ("<p>La posición de la palabra $palabra es $indice</p>");
            $validar = true;
            break;
        }
    }
    if (!$validar) {
        echo ("<h3>No existe la palabra programación en la frase</h3>");
        return;
    }

    echo "<hr>";

    echo "<h3>SUTITUCIÓN DE LA CADENA : </h2>";
    echo "<p>$fraseNueva</p>";
    echo "<hr>";
    echo "<h3>INDICAR SI EXISTE O NO EXISTE LA PALABRA 'PHP' : </h2>";
    //La coincidencia de la Cadena es la posición 0. 
    //Dicha posición 0 es un resultado booleanto falso al mismo tiempo. 
    //Pero para nosotros esa posicion 0 indica true. Porlo tanto necesitamos preguntar con un operador estricto si es false !== false
    if (strpos($frase, "PHP") !== false) {
        echo 'EXISTE';
    } else {
        echo 'NO EXISTE';
    }
    echo "<hr>";
    echo "<h2>Indicar cuantas letras “a” hay en la frase inicial del enunciado.: </h2>";
    $a = substr_count($frase, 'a') + substr_count($frase, 'A');
    echo "En nuestra frase hay en total : $a letras 'a' mayúsculas incluidas";

    echo "<hr>";


    $cadena = "Esta es una cadena de texto";
    $palabra = "es";

    $posicion = strpos($cadena, $palabra);

    if ($posicion !== false) {
        $posicion += 1; // Añade 1 a la posición
        echo "La palabra '$palabra' se encuentra en la posición $posicion";
    } else {
        echo "La palabra '$palabra' no se encontró en la cadena";
    }

    ?>









</body>

</html>