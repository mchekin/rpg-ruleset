<?php

namespace Mchekin\RpgRuleset\Race\Strategy;

use Mchekin\RpgRuleset\Character;
use Mchekin\RpgRuleset\Race\RaceStrategyInterface;

class ElfStrategy implements RaceStrategyInterface
{
    public function applyAttributeModifiers(Character $character): Character
    {
        $character->setAgility($character->getAgility() + 2);
        $character->setIntelligence($character->getIntelligence() + 2);
        $character->setConstitution($character->getConstitution() - 2);

        return $character;
    }
}