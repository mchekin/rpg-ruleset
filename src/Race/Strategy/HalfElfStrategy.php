<?php

namespace Mchekin\RpgRuleset\Race\Strategy;


use Mchekin\RpgRuleset\Character;
use Mchekin\RpgRuleset\CharacterBuilder;
use Mchekin\RpgRuleset\Race\RaceStrategyInterface;

class HalfElfStrategy implements RaceStrategyInterface
{
    public function applyAttributeModifiers(Character $character): Character
    {
        $character->setRaceModifier(CharacterBuilder::ATTRIBUTE_AGILITY, + 1);
        $character->setRaceModifier(CharacterBuilder::ATTRIBUTE_INTELLIGENCE, + 1);

        return $character;
    }
}