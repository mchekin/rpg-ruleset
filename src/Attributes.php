<?php

namespace Mchekin\RpgRuleset;



use InvalidArgumentException;

class Attributes
{
    /**
     * @var Attribute[]
     */
    private $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function getValue(string $name):int
    {
        return $this->getAttribute($name)->getValue();
    }

    public function setRaceModifier(string $name, int $modifier): Attributes
    {
        $this->getAttribute($name)->setRaceModifier($modifier);

        return $this;
    }

    /**
     * @param string $name
     * @return Attribute
     */
    private function getAttribute(string $name): Attribute
    {
        if (!isset($this->attributes[$name])) {
            throw new InvalidArgumentException("Attribute $name is not set");
        }

        return $this->attributes[$name];
    }
}