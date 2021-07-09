<?php

use App\Calculator\Addition;
use PHPUnit\Framework\TestCase;
use App\Calculator\Calculator;

class CalculatorTest extends TestCase
{
    /** @test */
    public function can_set_single_operation()
    {
        $addition = new Addition;
        $addition->setOperands([10, 5]);

        $calculator = new Calculator;
        $calculator->setOperation($addition);

        $this->assertCount(1, $calculator->getOperations());
    }

    /** @test */
    public function can_set_multiple_operations()
    {
        $addition1 = new Addition;
        $addition1->setOperands([2, 3]);

        $addition2 = new Addition;
        $addition2->setOperands([12, 3]);

        $calculator = new Calculator;
        $calculator->setOperations([$addition1, $addition2]);

        $this->assertCount(2, $calculator->getOperations());
    }

    /** @test */
    public function ignore_when_not_instance()
    {
        $addition = new Addition;
        $addition->setOperands([10, 5]);

        $calculator = new Calculator;
        $calculator->setOperations([$addition, 'cats', 'cars']);

        $this->assertCount(1, $calculator->getOperations());
    }

    /** @test */
    public function can_calculate_single_operation()
    {
        $addition = new Addition;
        $addition->setOperands([10, 5]);

        $calculator = new Calculator;
        $calculator->setOperation($addition);

        $this->assertEquals(15, $calculator->calculate());
    }

    /** @test */
    public function can_calculate_multiple_operations()
    {
        $addition1 = new Addition;
        $addition1->setOperands([2, 3]);

        $addition2 = new Addition;
        $addition2->setOperands([12, 3]);

        $calculator = new Calculator;
        $calculator->setOperations([$addition1, $addition2]);

        $this->assertEquals(5, $calculator->calculate()[0]);
        $this->assertEquals(15, $calculator->calculate()[1]);
    }
}
