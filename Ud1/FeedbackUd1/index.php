<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<h1>Feedback Ud1 - Pablo Bartolomé Gallardo</h1>
    <h2>Ejemplo 1</h2>

    <?php
    print "<p>Buenos días</p>\n";
    print "<p> ¿Cómo te llamas? </p>\n";
    print "<p>bye</p>\n";
    ?>

    <h2>Ejemplo 2</h2>
        <p>Buenos días</p>
        <?php
        print "<p>¿Cómo te llamas?</p>\n";
        print "<p>Bye Bye</p>\n";
        ?>

        <h2>Ejemplo 3</h2>
        <?php
        print "<p>Buenos días</p>\n";
        ?>
        <p>¿Cómo te llamas?</p>
        <?php
        print "<p>Bye Bye Bye</p>\n";
        ?>

<h3>¿Qué diferencias hay entre cada una de ellas?</h3>
<p>La diferencia entre los 3 ejemplos es que el html está incrustado dentro de las etiquetas de "&lt;?php". </p>
<p>De esta forma nos damos cuenta de que php es versátil a la hora de usarlo justo al código html</p>

<h3>¿Qué resultados al ejecutar se obtienen?</h3>
<p>Se obtiene el mismo resultado en todos los ejemplos. con la diferencia de que cada ejemplo suma la palabra 'Bye'</p>

</body>

</html>