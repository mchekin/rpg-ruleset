<?php

namespace Mchekin\RpgRuleset\Tests\Unit\Race\Strategy;


use DomainException;
use Mchekin\RpgRuleset\AttributeBuilder;
use Mchekin\RpgRuleset\Character;
use Mchekin\RpgRuleset\CharacterBuilder;
use Mchekin\RpgRuleset\Race\RaceStrategyFactory;
use Mchekin\RpgRuleset\Race\RaceStrategyInterface;
use Mchekin\RpgRuleset\Race\Strategy\DwarfStrategy;
use Mchekin\RpgRuleset\Race\Strategy\ElfStrategy;
use Mchekin\RpgRuleset\Race\Strategy\GnomeStrategy;
use Mchekin\RpgRuleset\Race\Strategy\HalfElfStrategy;
use Mchekin\RpgRuleset\Race\Strategy\HalflingStrategy;
use Mchekin\RpgRuleset\Race\Strategy\HalfOrcStrategy;
use Mchekin\RpgRuleset\Race\Strategy\HumanStrategy;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class RaceStrategyFactoryTest extends TestCase
{
    /**
     * @var RaceStrategyFactory
     */
    private $raceStrategyFactory;

    public function setUp()
    {
        parent::setUp();

        $this->raceStrategyFactory = new RaceStrategyFactory();
    }

    /**
     * @test
     *
     * @dataProvider raceDataProvider
     *
     * @param string $race
     * @param string $expectedStrategy
     */
    public function generatesCharacter(string $race, string $expectedStrategy)
    {
        // Act
        $strategy = $this->raceStrategyFactory->getStrategy($race);

        // Assert
        $this->assertSame($expectedStrategy, get_class($strategy));
    }

    /**
     * @return array
     */
    public function raceDataProvider()
    {
        return [
            [CharacterBuilder::RACE_HUMAN, HumanStrategy::class],
            [CharacterBuilder::RACE_ELF, ElfStrategy::class],
            [CharacterBuilder::RACE_HALF_ORC, HalfOrcStrategy::class],
            [CharacterBuilder::RACE_DWARF, DwarfStrategy::class],
            [CharacterBuilder::RACE_HALF_ELF, HalfElfStrategy::class],
            [CharacterBuilder::RACE_HALFLING, HalflingStrategy::class],
            [CharacterBuilder::RACE_GNOME, GnomeStrategy::class],
        ];
    }

    /**
     * @test
     *
     * @expectedException DomainException
     * @expectedExceptionMessage Race `Giant` is not supported.
     */
    public function throwsExceptionOnUnsupportedCharacterGender()
    {
        // Act
        $this->raceStrategyFactory->getStrategy("Giant");
    }

}