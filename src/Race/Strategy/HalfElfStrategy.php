<?php

namespace Mchekin\RpgRuleset\Race\Strategy;


use Mchekin\RpgRuleset\Character;
use Mchekin\RpgRuleset\Race\RaceStrategyInterface;

class HalfElfStrategy implements RaceStrategyInterface
{
    public function applyAttributeModifiers(Character $character): Character
    {
        $character->setAgility($character->getAgility() + 1);
        $character->setIntelligence($character->getIntelligence() + 1);

        return $character;
    }
}