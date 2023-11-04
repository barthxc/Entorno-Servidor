<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function primeraFuncion($dato){
        if($dato === "0"){
            echo "<p>Es un 0</p>";
        }else if($dato === "9" ){
            echo "<p>Es un 9</p>";
        }else{
            echo "<p>No es ni un 0 ni un 9</p>";
        }
    }

    function segundaFuncion($frase){
        return strlen($frase);
    }

    function terceraFuncion($a,$b){
        return $a**$b;
    }

    function cuartaFuncion($a,$b){
        return "$a $b";
    }

    function sumar($a,$b){
        return $a + $b;
    }
    
    function restar($a,$b){
        return $a - $b;
    }

    $variable = 4;


    primeraFuncion("0");

    $resultado = segundafuncion("hola");
    echo "<p> $resultado </p>";
    
    $resultado = terceraFuncion(3,3);
    echo "<p> $resultado </p>";
    
    $resultado = cuartaFuncion("maricon","y gay");
    echo "<p> $resultado </p>";



    ?>
    
</body>
</html>