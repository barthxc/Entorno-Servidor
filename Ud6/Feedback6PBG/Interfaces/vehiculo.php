<?php
interface Vehiculo {
    public function frenar(int $distancia): string;
    public function acelerar(int $distancia): string;
}
?>
