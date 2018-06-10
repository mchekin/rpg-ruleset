<?php

namespace Mchekin\RpgRuleset\Race;


use Mchekin\RpgRuleset\Character;

interface RaceStrategyInterface
{
    public function applyAttributeModifiers(Character $character): Character;
}