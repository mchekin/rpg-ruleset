<?php

namespace Mchekin\RpgRuleset\Tests\Integration;


use DomainException;
use Mchekin\RpgRuleset\AttributeBuilder;
use Mchekin\RpgRuleset\Character;
use Mchekin\RpgRuleset\CharacterBuilder;
use Mchekin\RpgRuleset\Dice\SixSidedDice;
use Mchekin\RpgRuleset\Race\RaceStrategyFactory;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class CharacterBuilderTest extends TestCase
{
    /**
     * @var MockInterface|AttributeBuilder
     */
    private $attributeBuilder;

    /**
     * @var MockInterface|RaceStrategyFactory
     */
    private $raceStrategyContext;

    /**
     * @var CharacterBuilder
     */
    private $characterBuilder;

    /**
     * @var Character
     */
    private $character;

    public function setUp()
    {
        parent::setUp();

        $this->attributeBuilder = new AttributeBuilder(new SixSidedDice());
        $this->raceStrategyContext = new RaceStrategyFactory();
        $this->character = new Character();

        $this->characterBuilder = new CharacterBuilder(
            $this->character,
            $this->attributeBuilder,
            $this->raceStrategyContext
        );
    }

    /**
     * @test
     * @dataProvider characterDataProvider
     * @param string $name
     * @param string $gender
     * @param string $race
     * @param string $class
     */
    public function generatesCharacter(string $name, string $gender, string $race, string $class)
    {
        // Arrange

        // Act
        $character = $this->characterBuilder
            ->setName($name)
            ->setGender($gender)
            ->setRace($race)
            ->setClass($class)
            ->build();

        // Assert
        $this->assertSame($name, $character->getName());
        $this->assertSame($gender, $character->getGender());
        $this->assertSame($race, $character->getRace());
        $this->assertSame($class, $character->getClass());

        $this->assertLessThanOrEqual(20, $character->getStrength());
        $this->assertLessThanOrEqual(20, $character->getAgility());
        $this->assertLessThanOrEqual(20, $character->getConstitution());
        $this->assertLessThanOrEqual(20, $character->getIntelligence());
        $this->assertLessThanOrEqual(20, $character->getWisdom());
        $this->assertLessThanOrEqual(20, $character->getCharisma());

        $this->assertGreaterThanOrEqual(1, $character->getStrength());
        $this->assertGreaterThanOrEqual(1, $character->getAgility());
        $this->assertGreaterThanOrEqual(1, $character->getConstitution());
        $this->assertGreaterThanOrEqual(1, $character->getIntelligence());
        $this->assertGreaterThanOrEqual(1, $character->getWisdom());
        $this->assertGreaterThanOrEqual(1, $character->getCharisma());
    }

    /**
     * @return array
     */
    public function characterDataProvider()
    {
        return [
//            ['Jorik', 'Male', 'Human', 'Paladin'],
//            ['Julia', 'Female', 'Elf', 'Thief'],
//            ['Gork', 'Male', 'Half-orc', 'Warrior'],
            ['Rosksana', 'Shemale', 'Dwarf', 'Priest'],
        ];
    }

    /**
     * @test
     * @expectedException DomainException
     * @expectedExceptionMessage Unsupported character gender Stone.
     */
    public function throwsExceptionOnUnsupportedCharacterGender()
    {
        // Arrange

        // Act
        $this->characterBuilder->setGender('Stone');

        // Assert
    }

    /**
     * @test
     * @expectedException DomainException
     * @expectedExceptionMessage Unsupported character race Munchkin.
     */
    public function throwsExceptionOnUnsupportedCharacterRace()
    {
        // Arrange

        // Act
        $this->characterBuilder->setRace('Munchkin');

        // Assert
    }

    /**
     * @test
     * @expectedException DomainException
     * @expectedExceptionMessage Unsupported character class Space Monkey.
     */
    public function throwsExceptionOnUnsupportedCharacterClass()
    {
        // Arrange

        // Act
        $this->characterBuilder->setClass('Space Monkey');

        // Assert
    }
}