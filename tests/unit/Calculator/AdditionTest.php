<?php

use App\Calculator\Addition;
use PHPUnit\Framework\TestCase;

class AdditionTest extends TestCase
{
    /** @test */
    public function adds_given_is_executed()
    {
        $addition = new Addition;
        $addition->setOperands([15, 20]);

        $this->assertEquals(35, $addition->calculate());
    }

    /** @test */
    public function return_error_when_operand_is_not_given()
    {
        $this->expectException(\App\Calculator\Exceptions\NoOperandException::class);

        $addition = new Addition;
        $addition->calculate();
    }
}