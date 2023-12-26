<?php

class Coche implements Vehiculo {
    protected static $velocidad = 0;

    public function frenar(int $distancia): string {
        self::$velocidad = 0;
        return "El coche ha frenado ya y va a " . self::$velocidad . "km/hora";
    }

    public function acelerar(int $distancia): string {
        if (self::$velocidad + $distancia <= 120) {
            self::$velocidad += $distancia;
        } else {
            self::$velocidad = 120;
        }

        return "El coche ha acelerado y va a " . self::$velocidad . "km/hora";
    }
}

?>