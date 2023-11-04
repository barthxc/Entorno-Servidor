<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bucles </title>
</head>
<body>
    <h2>Bucle For</h2>

    <?php
        for($i=0; $i <= 100; $i+=5){
            echo "<p>$i</p>";
        }
    ?>

    <h2>Bucle While</h2>
    <?php
    $a=0;
        while($a<=100){
            echo "<p>$a</p>";
            $a+=5;
        }
    ?>
    <h2>Bucle For 320 - 160</h2>
    <?php
        for($i=320; $i >=160; $i-=20){
            echo "<p>$i</p>";
        }
    ?>
    <h2>Número de dígitos</h2>
    <?php
    $randomNumber = rand(0,1000);
    $StringNumber = (string)$randomNumber;
    $digitos = strlen($StringNumber);
    echo "<p>Número : $randomNumber </p>";
    echo "<p>Número degitos : $digitos </p>";
    ?>
    <h2>Media</h2>
    <?php
    $contador = 0;
    $sumaTotal = 0;

    do{
        $numero = rand(0,99999);
        $sumaTotal += $numero;
        $contador ++;
        echo "numero generado $numero";
    }while($numero >=20);
    
    echo "Número de vueltas = $contador";
    $media = $sumaTotal/$contador;
    echo "Media : $media ";
    ?>
</body>
</html>