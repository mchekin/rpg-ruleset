<?php

namespace Mchekin\RpgRuleset;


use DomainException;
use Mchekin\RpgRuleset\Race\RaceStrategyFactory;

class CharacterBuilder
{
    const ATTRIBUTE_STRENGTH = 'Strength';
    const ATTRIBUTE_AGILITY = 'Agility';
    const ATTRIBUTE_CONSTITUTION = 'Constitution';
    const ATTRIBUTE_WISDOM = 'Wisdom';
    const ATTRIBUTE_INTELLIGENCE = 'Intelligence';
    const ATTRIBUTE_CHARISMA = 'Charisma';

    const RACE_HUMAN = 'Human';
    const RACE_ELF = 'Elf';
    const RACE_HALF_ELF = 'Half-elf';
    const RACE_DWARF = 'Dwarf';
    const RACE_HALF_ORC = 'Half-orc';
    const RACE_HALFLING = 'Halfling';
    const RACE_GNOME = 'Gnome';

    const CLASS_BARBARIAN = 'Barbarian';
    const CLASS_BARD = 'Bard';
    const CLASS_PRIEST = 'Priest';
    const CLASS_DRUID = 'Druid';
    const CLASS_WARRIOR = 'Warrior';
    const CLASS_MONK = 'Monk';
    const CLASS_PALADIN = 'Paladin';
    const CLASS_RANGER = 'Ranger';
    const CLASS_THIEF = 'Thief';
    const CLASS_SORCERER = 'Sorcerer';
    const CLASS_WIZARD = 'Wizard';

    const GENDER_MALE = 'Male';
    const GENDER_FEMALE = 'Female';
    const GENDER_SHEMALE = 'Shemale';

    const ATTRIBUTES = [
        self::ATTRIBUTE_STRENGTH,
        self::ATTRIBUTE_AGILITY,
        self::ATTRIBUTE_CONSTITUTION,
        self::ATTRIBUTE_WISDOM,
        self::ATTRIBUTE_INTELLIGENCE,
        self::ATTRIBUTE_CHARISMA,
    ];

    const RACES = [
        self::RACE_HUMAN,
        self::RACE_ELF,
        self::RACE_HALF_ELF,
        self::RACE_DWARF,
        self::RACE_HALF_ORC,
        self::RACE_HALFLING,
        self::RACE_GNOME,
    ];

    const CLASSES = [
        self::CLASS_BARBARIAN,
        self::CLASS_BARD,
        self::CLASS_PRIEST,
        self::CLASS_DRUID,
        self::CLASS_WARRIOR,
        self::CLASS_MONK,
        self::CLASS_PALADIN,
        self::CLASS_RANGER,
        self::CLASS_THIEF,
        self::CLASS_SORCERER,
        self::CLASS_WIZARD,
    ];

    const GENDERS = [
        self::GENDER_MALE,
        self::GENDER_FEMALE,
        self::GENDER_SHEMALE,
    ];

    /**
     * @var AttributeBuilder
     */
    private $attributeBuilder;

    /**
     * @var Character
     */
    private $character;

    /**
     * @var RaceStrategyFactory
     */
    private $raceStrategyFactory;

    public function __construct(
        Character $character,
        AttributeBuilder $attributeBuilder,
        RaceStrategyFactory $raceStrategyFactory)
    {
        $this->character = $character;
        $this->attributeBuilder = $attributeBuilder;
        $this->raceStrategyFactory = $raceStrategyFactory;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): CharacterBuilder
    {
        $this->character->setName($name);

        return $this;
    }

    /**
     * @param string $gender
     * @return $this
     */
    public function setGender(string $gender): CharacterBuilder
    {
        if (!in_array($gender, self::GENDERS)) {
            throw new DomainException("Unsupported character gender $gender.");
        }

        $this->character->setGender($gender);

        return $this;
    }

    /**
     * @param string $race
     * @return $this
     */
    public function setRace(string $race): CharacterBuilder
    {
        if (!in_array($race, self::RACES)) {
            throw new DomainException("Unsupported character race $race.");
        }

        $this->character->setRace($race);

        return $this;
    }

    /**
     * @param string $class
     * @return $this
     */
    public function setClass(string $class): CharacterBuilder
    {
        if (!in_array($class, self::CLASSES)) {
            throw new DomainException("Unsupported character class $class.");
        }

        $this->character->setClass($class);

        return $this;
    }

    /**
     * @return Character
     */
    public function build(): Character
    {
        $this->generateBaseAttributes()
            ->applyRaceModifiers()
            ->applyClassModifiers();

        /** TODO:  */

        return $this->character;
    }

    /**
     * @return CharacterBuilder
     */
    private function generateBaseAttributes(): CharacterBuilder
    {
        $attributes = $this->attributeBuilder->build(self::ATTRIBUTES);

        $this->character->setAttributes($attributes);

        return $this;
    }

    private function applyRaceModifiers()
    {
        $raceStrategy = $this->raceStrategyFactory->getStrategy($this->character->getRace());

        $this->character = $raceStrategy->applyAttributeModifiers($this->character);

        return $this;
    }

    private function applyClassModifiers()
    {
        return $this;
    }
}