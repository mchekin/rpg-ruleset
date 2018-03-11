<?php

namespace Mchekin\RpgRuleset\Dice;


abstract class Dice
{
    /**
     * @return int
     */
    abstract public function roll(): int;
}