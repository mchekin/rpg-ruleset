<?php

namespace Mchekin\RpgRuleset\Race;


use Mchekin\RpgRuleset\Character;
use Mchekin\RpgRuleset\CharacterBuilder;

class RaceStrategyContext
{
    /**
     * @var RaceStrategyInterface
     */
    private $strategy;
    /**
     * @var Character
     */
    private $character;

    public function __construct(Character $character)
    {
        switch ($character->getRace())
        {
            case CharacterBuilder::RACE_DWARF:
                $this->strategy = new DwarfStrategy();
        }

        $this->character = $character;
    }

    /**
     * @return RaceStrategyContext
     */
    public function applyAttributeModifiers(): RaceStrategyContext
    {
        $this->strategy->applyAttributeModifiers($this->character);

        return $this;
    }
}