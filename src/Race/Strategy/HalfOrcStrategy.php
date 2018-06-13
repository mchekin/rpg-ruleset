<?php

namespace Mchekin\RpgRuleset\Race\Strategy;


use Mchekin\RpgRuleset\Character;
use Mchekin\RpgRuleset\Race\RaceStrategyInterface;

class HalfOrcStrategy implements RaceStrategyInterface
{
    public function applyAttributeModifiers(Character $character): Character
    {
        $character->setStrength($character->getStrength() + 1);
        $character->setConstitution($character->getConstitution() + 1);

        return $character;
    }
}