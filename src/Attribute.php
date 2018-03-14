<?php

namespace Mchekin\RpgRuleset;

use Mchekin\RpgRuleset\Dice\Dice;

class Attribute
{
    private $value;
    /**
     * @var Dice
     */
    private $dice;

    /**
     * Attribute constructor.
     * @param Dice $dice
     */
    public function __construct(Dice $dice)
    {
        $this->dice = $dice;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        if (is_null($this->value)) {
            $this->value = $this->generateValue();
        }

        return $this->value;
    }

    /**
     * @return int
     */
    private function generateValue(): int
    {
        return $this->value = $this->dice->roll() + $this->dice->roll() + $this->dice->roll();
    }
}