<?php

namespace Mchekin\RpgRuleset;

use Mchekin\RpgRuleset\Dice\Dice;

class AttributeBuilder
{
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
     * @param string $attributeType
     * @return Attribute
     */
    public function build(string $attributeType)
    {
        return new Attribute($this->generateValue(), $attributeType);
    }

    /**
     * @return int
     */
    private function generateValue(): int
    {
        return array_sum([
            $this->dice->roll(),
            $this->dice->roll(),
            $this->dice->roll()
        ]);
    }
}