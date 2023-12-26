<?php
class Circulo extends Figura {
    protected static $radio;

    public function __construct($x, $y, $radio) {
        parent::__construct($x, $y);
        self::$radio = $radio;
    }

    public function area(): float {
        return M_PI * pow(self::$radio, 2);
    }
}
?>