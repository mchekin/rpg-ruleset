<?php

namespace Mchekin\RpgRuleset;


use DomainException;

class CharacterBuilder
{
    const ATTRIBUTE_TYPES = [
        'Strength',
        'Agility',
        'Constitution',
        'Wisdom',
        'Intelligence',
        'Charisma',
    ];

    const RACES = [
        'Human',
        'Elf',
        'Half-elf',
        'Dwarf',
        'Half-orc',
        'Halfling',
        'Gnome',
    ];

    const CLASSES = [
        'Barbarian',
        'Bard',
        'Priest',
        'Druid',
        'Warrior',
        'Monk',
        'Paladin',
        'Ranger',
        'Thief',
        'Sorcerer',
        'Wizard',
    ];

    const GENDERS = [
        'Male',
        'Female',
        'Shemale',
    ];

    /**
     * @var AttributeBuilder
     */
    private $attributeBuilder;

    /**
     * @var Character
     */
    private $character;

    public function __construct(AttributeBuilder $attributeBuilder)
    {
        $this->character = new Character();
        $this->attributeBuilder = $attributeBuilder;
    }

    /**
     * @return Character
     */
    public function build(): Character
    {
        $this->generateAttributes();

        /** TODO:  */

        return $this->character;
    }

    /**
     * @return CharacterBuilder
     */
    private function generateAttributes(): CharacterBuilder
    {
        foreach(self::ATTRIBUTE_TYPES as $attributeType)
        {
            $setter = "set{$attributeType}";

            $this->character->$setter($this->attributeBuilder->build($attributeType));
        }


        return $this;
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
        if (!in_array($gender, self::GENDERS))
        {
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
        if (!in_array($race, self::RACES))
        {
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
        if (!in_array($class, self::CLASSES))
        {
            throw new DomainException("Unsupported character class $class.");
        }

        $this->character->setClass($class);

        return $this;
    }
}