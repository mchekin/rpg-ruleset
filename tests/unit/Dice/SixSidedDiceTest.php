<?php

namespace Mchekin\RpgRuleset\Tests\Unit\Dice;


use Mchekin\RpgRuleset\Dice\SixSidedDice;
use PHPUnit\Framework\TestCase;

class SixSidedDiceTest extends TestCase
{
    /**
     * @test
     */
    public function generatesAttribute()
    {
        // Arrange

        // Act
        $diceRoll = (new SixSidedDice())->roll();

        // Assert
        $this->assertGreaterThanOrEqual('1', $diceRoll);
        $this->assertLessThanOrEqual('6', $diceRoll);
    }
}