<?php

namespace Mchekin\RpgRuleset\Race\Strategy;


use Mchekin\RpgRuleset\Character;
use Mchekin\RpgRuleset\Race\RaceStrategyInterface;

class DwarfStrategy implements RaceStrategyInterface
{
    public function applyAttributeModifiers(Character $character): Character
    {
        $character->setConstitution($character->getConstitution() + 2);
        $character->setWisdom($character->getWisdom() + 2);
        $character->setCharisma($character->getCharisma() - 2);

        return $character;
    }
}