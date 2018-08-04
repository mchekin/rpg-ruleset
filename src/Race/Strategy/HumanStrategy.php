<?php

namespace Mchekin\RpgRuleset\Race\Strategy;


use Mchekin\RpgRuleset\Character;
use Mchekin\RpgRuleset\CharacterBuilder;
use Mchekin\RpgRuleset\Race\RaceStrategyInterface;

class HumanStrategy implements RaceStrategyInterface
{
    public function applyAttributeModifiers(Character $character): Character
    {
        list($attribute1, $attribute2)= array_rand(array_flip(CharacterBuilder::ATTRIBUTES), 2);

        $character->setRaceModifier($attribute1, + 1);
        $character->setRaceModifier($attribute2, + 1);

        return $character;
    }
}