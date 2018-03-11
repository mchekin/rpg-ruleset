<?php

namespace Mchekin\RpgRuleset\Tests\Unit;


use Mchekin\RpgRuleset\Attribute;
use Mchekin\RpgRuleset\Dice\Dice;
use Mockery;
use PHPUnit\Framework\TestCase;

class AttributeTest extends TestCase
{
    /**
     * @var Mockery\MockInterface|Dice
     */
    private $dice;

    public function setUp()
    {
        parent::setUp();

        $this->dice = Mockery::mock(Dice::class);
    }

    public function tearDown()
    {
        Mockery::close();

        parent::tearDown(); // TODO: Change the autogenerated stub
    }

    /**
     * @dataProvider rollsProvider
     * @test
     * @param int $firstDiceRoll
     * @param int $secondDiceRoll
     * @param int $thirdDiceRoll
     */
    public function generatesAttribute(int $firstDiceRoll, int $secondDiceRoll, int $thirdDiceRoll)
    {
        // Arrange
        $diceRollsSum = $firstDiceRoll + $secondDiceRoll + $thirdDiceRoll;
        $this->dice->shouldReceive('roll')->once()->andReturn($firstDiceRoll);
        $this->dice->shouldReceive('roll')->once()->andReturn($secondDiceRoll);
        $this->dice->shouldReceive('roll')->once()->andReturn($thirdDiceRoll);

        // Act
        $attribute = new Attribute($this->dice);

        // Assert
        $this->assertEquals($diceRollsSum, $attribute->getValue());
    }

    /**
     * @return array
     */
    public function rollsProvider()
    {
        return [
            [1, 1 ,1],
            [6, 6 ,6],
            [3, 4 ,5],
        ];
    }
}