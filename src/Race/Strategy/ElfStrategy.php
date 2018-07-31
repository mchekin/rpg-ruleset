<?php

namespace Mchekin\RpgRuleset\Race\Strategy;

use Mchekin\RpgRuleset\Character;
use Mchekin\RpgRuleset\CharacterBuilder;
use Mchekin\RpgRuleset\Race\RaceStrategyInterface;

class ElfStrategy implements RaceStrategyInterface
{
    public function applyAttributeModifiers(Character $character): Character
    {
        $character->setRaceModifier(CharacterBuilder::ATTRIBUTE_AGILITY, + 2);
        $character->setRaceModifier(CharacterBuilder::ATTRIBUTE_INTELLIGENCE, + 2);
        $character->setRaceModifier(CharacterBuilder::ATTRIBUTE_CONSTITUTION, - 2);

        return $character;
    }
}