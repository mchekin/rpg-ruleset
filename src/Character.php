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

    public function setAttributes(Attributes $attributes)
    {
        $this->attributes = $attributes;
    }

    public function setRaceModifier(string $attribute, int $modifier)
    {
        $this->attributes->setRaceModifier($attribute, $modifier);
    }

    public function setName(string $name): Character
    {
        $this->name = $name;
        return $this;
    }

    public function setGender(string $gender): Character
    {
        $this->gender = $gender;
        return $this;
    }

    public function setRace(string $race): Character
    {
        $this->race = $race;
        return $this;
    }

    public function setClass(string $class): Character
    {
        $this->class = $class;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getRace(): string
    {
        return $this->race;
    }

    public function getClass(): string
    {
        return $this->class;
    }

    public function getStrength(): int
    {
        return $this->attributes->getValue(CharacterBuilder::ATTRIBUTE_STRENGTH);
    }

    public function getAgility(): int
    {
        return $this->attributes->getValue(CharacterBuilder::ATTRIBUTE_AGILITY);
    }

    public function getConstitution(): int
    {
        return $this->attributes->getValue(CharacterBuilder::ATTRIBUTE_CONSTITUTION);
    }

    public function getWisdom(): int
    {
        return $this->attributes->getValue(CharacterBuilder::ATTRIBUTE_WISDOM);
    }

    public function getIntelligence(): int
    {
        return $this->attributes->getValue(CharacterBuilder::ATTRIBUTE_INTELLIGENCE);
    }

    public function getCharisma(): int
    {
        return $this->attributes->getValue(CharacterBuilder::ATTRIBUTE_CHARISMA);
    }
}