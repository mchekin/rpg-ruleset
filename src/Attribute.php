<?php

namespace Mchekin\RpgRuleset;


use DomainException;

class Attribute
{
    /**
     * @var int
     */
    private $baseValue;

    /**
     * @var int
     */
    private $raceModifier;
    
    /**
     * @var string
     */
    private $name;

    public function __construct(int $baseValue, string $attributeType)
    {
        $this->baseValue = $baseValue;
        $this->name = $attributeType;
    }

    /**
     * @return int
     */
    public function getBaseValue(): int
    {
        return $this->baseValue;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->baseValue + $this->raceModifier;
    }

    /**
     * @param int $raceModifier
     */
    public function setRaceModifier(int $raceModifier)
    {
        if(isset($this->raceModifier))
        {
            throw new DomainException("Attribute race modifier can only be set once.");
        }

        $this->raceModifier = $raceModifier;
    }
}