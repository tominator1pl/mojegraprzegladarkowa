<?php
class weapon
{
    var $attack;
    var $speed;

    /**
     * Create new weapon
     * @param $atk int attack damage of weapon
     * @param $spd int speed of attacks
     */
    function __construct($atk, $spd)
    {
        $this->attack = $atk;
        $this->speed = $spd;
    }
}