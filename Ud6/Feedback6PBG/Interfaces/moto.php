<?php
class Moto implements Vehiculo {
    protected static $velocidad = 0;

    public function frenar(int $distancia): string {
        self::$velocidad = 0;
        return "La moto ha frenado ya y va a " . self::$velocidad . "km/hora";
    }

    public function acelerar(int $distancia): string {
        if (self::$velocidad + $distancia <= 80) {
            self::$velocidad += $distancia;
        } else {
            self::$velocidad = 80;
        }

        return "La moto ha acelerado y va a " . self::$velocidad . "km/hora";
    }
}
?>