<?php

namespace Mchekin\RpgRuleset;

use Mchekin\RpgRuleset\Dice\Dice;

class Attribute
{
    private $value;

    /**
     * Attribute constructor.
     * @param Dice $dice
     */
    public function __construct(Dice $dice)
    {
        $this->value = $this->generateValue($dice);
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param Dice $dice
     * @return int
     */
    private function generateValue(Dice $dice): int
    {
        return $dice->roll() + $dice->roll() + $dice->roll();
    }
}