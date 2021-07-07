<?php

use PHPUnit\Framework\TestCase;
use App\Calculator\Division;

class DivisionTest extends TestCase
{
    /** @test */
    public function divs_given_is_executed()
    {
        $division = new Division;
        $division->setOperands([100, 2]);

        $this->assertEquals(50, $division->calculate());
    }

    /** @test */
    public function return_error_when_operand_is_not_given()
    {
        $this->expectException(\App\Calculator\Exceptions\NoOperandException::class);

        $addition = new Division;
        $addition->calculate();
    }

    /** @test */
    public function removes_division_by_zero_operands()
    {
        $division = new Division;
        $division->setOperands([50, 0, 2, 0]);

        $this->assertEquals(25, $division->calculate());
    }
}