<?php

namespace Mchekin\RpgRuleset\Race;


use DomainException;
use Mchekin\RpgRuleset\CharacterBuilder;
use Mchekin\RpgRuleset\Race\Strategy\DwarfStrategy;
use Mchekin\RpgRuleset\Race\Strategy\ElfStrategy;
use Mchekin\RpgRuleset\Race\Strategy\GnomeStrategy;
use Mchekin\RpgRuleset\Race\Strategy\HalfElfStrategy;
use Mchekin\RpgRuleset\Race\Strategy\HalflingStrategy;
use Mchekin\RpgRuleset\Race\Strategy\HalfOrcStrategy;
use Mchekin\RpgRuleset\Race\Strategy\HumanStrategy;

class RaceStrategyFactory
{
    public function getStrategy(string $race): RaceStrategyInterface
    {
        switch ($race)
        {
            case CharacterBuilder::RACE_DWARF:
                return new DwarfStrategy();
            case CharacterBuilder::RACE_ELF:
                return new ElfStrategy();
            case CharacterBuilder::RACE_GNOME:
                return new GnomeStrategy();
            case CharacterBuilder::RACE_HALF_ELF:
                return new HalfElfStrategy();
            case CharacterBuilder::RACE_HALF_ORC:
                return new HalfOrcStrategy();
            case CharacterBuilder::RACE_HALFLING:
                return new HalflingStrategy();
            case CharacterBuilder::RACE_HUMAN:
                return new HumanStrategy();
        }

        throw new DomainException("Race `$race` is not supported.");
    }
}