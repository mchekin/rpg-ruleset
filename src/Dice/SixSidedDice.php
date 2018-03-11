<?php

namespace Mchekin\RpgRuleset\Dice;


class SixSidedDice extends Dice
{
    /**
     * @return int
     */
    public function roll(): int
    {
        return rand(1, 6);
    }
}