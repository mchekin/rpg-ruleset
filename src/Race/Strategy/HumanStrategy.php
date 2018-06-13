<?php

namespace Mchekin\RpgRuleset\Race\Strategy;


use Mchekin\RpgRuleset\Character;
use Mchekin\RpgRuleset\CharacterBuilder;
use Mchekin\RpgRuleset\Race\RaceStrategyInterface;

class HumanStrategy implements RaceStrategyInterface
{
    public function applyAttributeModifiers(Character $character): Character
    {
        list($key1, $key2)= array_rand(CharacterBuilder::ATTRIBUTE_TYPES, 2);

        $attributeType1 = CharacterBuilder::ATTRIBUTE_TYPES[$key1];
        $attributeType2 = CharacterBuilder::ATTRIBUTE_TYPES[$key2];

        $setter1 = "set{$attributeType1}";
        $setter2 = "set{$attributeType2}";

        $getter1 = "get{$attributeType1}";
        $getter2 = "get{$attributeType2}";

        $character->$setter1($character->$getter1() + 1);
        $character->$setter2($character->$getter2() + 1);

        return $character;
    }
}