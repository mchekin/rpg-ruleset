<?php

namespace Mchekin\RpgRuleset;


class Attribute
{
    /**
     * @var int
     */
    private $value;
    
    /**
     * @var string
     */
    private $attributeType;

    public function __construct(int $value, string $attributeType)
    {

        $this->value = $value;
        $this->attributeType = $attributeType;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getAttributeType(): string
    {
        return $this->attributeType;
    }
}