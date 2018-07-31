<?php

namespace Mchekin\RpgRuleset;


class Character
{
    /** @var string */
    private $gender;

    /** @var string */
    protected $name;

    /** @var string */
    protected $race;

    /** @var string */
    protected $class;

    /** @var Attributes */
    private $attributes;

    /**
     * @return int
     */
    public function getStrength(): int
    {
        return $this->attributes->getValue(CharacterBuilder::ATTRIBUTE_STRENGTH);
    }

    /**
     * @return int
     */
    public function getAgility(): int
    {
        return $this->attributes->getValue(CharacterBuilder::ATTRIBUTE_AGILITY);
    }

    /**
     * @return int
     */
    public function getConstitution(): int
    {
        return $this->attributes->getValue(CharacterBuilder::ATTRIBUTE_CONSTITUTION);
    }

    /**
     * @return int
     */
    public function getWisdom(): int
    {
        return $this->attributes->getValue(CharacterBuilder::ATTRIBUTE_WISDOM);
    }

    /**
     * @return int
     */
    public function getIntelligence(): int
    {
        return $this->attributes->getValue(CharacterBuilder::ATTRIBUTE_INTELLIGENCE);
    }

    /**
     * @return int
     */
    public function getCharisma(): int
    {
        return $this->attributes->getValue(CharacterBuilder::ATTRIBUTE_CHARISMA);
    }

    public function setAttributes(Attributes $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @param string $name
     * @return Character
     */
    public function setName(string $name): Character
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $gender
     * @return Character
     */
    public function setGender(string $gender): Character
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @param string $race
     * @return Character
     */
    public function setRace(string $race): Character
    {
        $this->race = $race;
        return $this;
    }

    /**
     * @param string $class
     * @return Character
     */
    public function setClass(string $class): Character
    {
        $this->class = $class;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @return string
     */
    public function getRace(): string
    {
        return $this->race;
    }

    /**
     * @return string
     */
    public function getClass(): string
    {
        return $this->class;
    }

    public function setRaceModifier(string $attribute, int $modifier)
    {
        $this->attributes->setRaceModifier($attribute, $modifier);
    }
}