<?php

namespace Mchekin\RpgRuleset\Race\Strategy;


use Mchekin\RpgRuleset\Character;
use Mchekin\RpgRuleset\Race\RaceStrategyInterface;

class HalflingStrategy implements RaceStrategyInterface
{
    public function applyAttributeModifiers(Character $character): Character
    {
        $character->setAgility($character->getAgility() + 2);
        $character->setCharisma($character->getCharisma() + 2);
        $character->setStrength($character->getStrength() - 2);

        return $character;
    }
}