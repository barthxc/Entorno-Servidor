<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>

    <?php


$español = ['Coche', 'Niño', 'Teclado', 'Cámara', 'Perro', 'Pelota', 'Sol', 'Libro', 'Silla', 'Casa', 'Mesa', 'Bolígrafo', 'Agua', 'Papel', 'Flor', 'Reloj', 'Manzana', 'Árbol', 'Puerta', 'Ventana', 'Piedra', 'Estrella', 'Luna', 'Montaña', 'Playa', 'Camisa', 'Zapatos', 'Gato', 'Tren', 'Avión', 'Peluche', 'Ratón', 'Cielo', 'Tierra', 'Fuego', 'Nube', 'Ojo', 'Boca', 'Nariz', 'Oreja', 'Pelo', 'Brazo', 'Pierna', 'Dedo', 'Uña', 'Barriga', 'Cuello', 'Diente', 'Labio', 'Lengua'];

$ingles = ['Car', 'Boy', 'Keyboard', 'Camera', 'Dog', 'Ball', 'Sun', 'Book', 'Chair', 'House', 'Table', 'Pen', 'Water', 'Paper', 'Flower', 'Clock', 'Apple', 'Tree', 'Door', 'Window', 'Stone', 'Star', 'Moon', 'Mountain', 'Beach', 'Shirt', 'Shoes', 'Cat', 'Train', 'Plane', 'Teddy bear', 'Mouse', 'Sky', 'Earth', 'Fire', 'Cloud', 'Eye', 'Mouth', 'Nose', 'Ear', 'Hair', 'Arm', 'Leg', 'Finger', 'Nail', 'Belly', 'Neck', 'Tooth', 'Lip', 'Tongue'];



        
    ?>
</head>

<body>
    <h1>Tabla de Idiomas</h1>

    <table border="1">

        <th colspan="2">Español - Inglés</th>

        <?php
        for ($i =  0; $i < count($ingles); $i++) {
            echo "
            <tr>
                <td>$español[$i]</td>
                <td>$ingles[$i]</td>
            </tr>
            ";
        }
        ?>
    </table>

















</body>

</html>

