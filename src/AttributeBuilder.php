<?php

namespace Mchekin\RpgRuleset;

use DomainException;
use Mchekin\RpgRuleset\Dice\Dice;

class AttributeBuilder
{
    /**
     * @var Dice
     */
    private $dice;

    const ATTRIBUTE_TYPES = [
        'Strength',
        'Agility',
        'Constitution',
        'Wisdom',
        'Intelligence',
        'Charisma',
    ];

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
        if (!in_array($attributeType, self::ATTRIBUTE_TYPES))
        {
            throw new DomainException("Unsupported attribute $attributeType.");
        }

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