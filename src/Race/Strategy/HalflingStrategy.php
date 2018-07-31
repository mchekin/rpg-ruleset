<?php

namespace Mchekin\RpgRuleset\Race\Strategy;


use Mchekin\RpgRuleset\Character;
use Mchekin\RpgRuleset\CharacterBuilder;
use Mchekin\RpgRuleset\Race\RaceStrategyInterface;

class HalflingStrategy implements RaceStrategyInterface
{
    public function applyAttributeModifiers(Character $character): Character
    {
        $character->setRaceModifier(CharacterBuilder::ATTRIBUTE_AGILITY, + 2);
        $character->setRaceModifier(CharacterBuilder::ATTRIBUTE_CHARISMA, + 2);
        $character->setRaceModifier(CharacterBuilder::ATTRIBUTE_STRENGTH, - 2);

        return $character;
    }
}