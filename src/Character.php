<?php

namespace Mchekin\RpgRuleset;


class Character
{
    /** @var int */
    protected $strength;

    /** @var int */
    protected $agility;

    /** @var int */
    protected $constitution;

    /** @var int */
    protected $wisdom;

    /** @var int */
    protected $intelligence;

    /** @var int */
    protected $charisma;

    /** @var string */
    private $gender;

    /** @var string */
    protected $name;

    /** @var string */
    protected $race;

    /** @var string */
    protected $class;

    /**
     * @param int $strength
     * @return Character
     */
    public function setStrength(int $strength)
    {
        $this->strength = $strength;
        return $this;
    }

    /**
     * @param int $agility
     * @return Character
     */
    public function setAgility(int $agility)
    {
        $this->agility = $agility;
        return $this;
    }

    /**
     * @param int $constitution
     * @return Character
     */
    public function setConstitution(int $constitution)
    {
        $this->constitution = $constitution;
        return $this;
    }

    /**
     * @param int $wisdom
     * @return Character
     */
    public function setWisdom(int $wisdom)
    {
        $this->wisdom = $wisdom;
        return $this;
    }

    /**
     * @param int $intelligence
     * @return Character
     */
    public function setIntelligence(int $intelligence)
    {
        $this->intelligence = $intelligence;
        return $this;
    }

    /**
     * @param int $charisma
     * @return Character
     */
    public function setCharisma(int $charisma)
    {
        $this->charisma = $charisma;
        return $this;
    }

    /**
     * @return int
     */
    public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * @return int
     */
    public function getAgility(): int
    {
        return $this->agility;
    }

    /**
     * @return int
     */
    public function getConstitution(): int
    {
        return $this->constitution;
    }

    /**
     * @return int
     */
    public function getWisdom(): int
    {
        return $this->wisdom;
    }

    /**
     * @return int
     */
    public function getIntelligence(): int
    {
        return $this->intelligence;
    }

    /**
     * @return int
     */
    public function getCharisma(): int
    {
        return $this->charisma;
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
}