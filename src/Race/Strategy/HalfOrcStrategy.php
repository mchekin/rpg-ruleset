<?php

namespace Mchekin\RpgRuleset\Race\Strategy;


use Mchekin\RpgRuleset\Character;
use Mchekin\RpgRuleset\CharacterBuilder;
use Mchekin\RpgRuleset\Race\RaceStrategyInterface;

class HalfOrcStrategy implements RaceStrategyInterface
{
    public function applyAttributeModifiers(Character $character): Character
    {
        $character->setRaceModifier(CharacterBuilder::ATTRIBUTE_STRENGTH, + 1);
        $character->setRaceModifier(CharacterBuilder::ATTRIBUTE_CONSTITUTION, + 1);

        return $character;
    }
}