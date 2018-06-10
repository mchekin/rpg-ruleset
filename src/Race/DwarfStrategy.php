<?php

namespace Mchekin\RpgRuleset\Race;


use Mchekin\RpgRuleset\Character;

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