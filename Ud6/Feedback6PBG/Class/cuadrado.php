<?php
class Cuadrado extends Figura {
    protected static $lado;

    public function __construct($x, $y, $lado) {
        parent::__construct($x, $y);
        self::$lado = $lado;
    }

    public function area(): float {
        return pow(self::$lado, 2);
    }
}
?>