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
     * @param array $attributeNames
     *
     * @return Attributes
     */
    public function build(array $attributeNames)
    {
        $attributes = [];

        foreach ($attributeNames as $name) {
            $attributes[$name] = new Attribute($this->generateValue(), $name);
        }

        return new Attributes($attributes);
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