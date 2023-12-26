<?php
$vehiculos = array(new Coche(), new Moto());

foreach ($vehiculos as $vehiculo) {
    echo $vehiculo->frenar(10) . "\n";
    echo $vehiculo->acelerar(20) . "\n";
}
?>
