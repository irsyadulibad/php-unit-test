<?php
namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandException;

class Addition extends OperationAbstract implements OperandInterface
{
    public function calculate()
    {
        if(count($this->operands) < 1) {
            throw new NoOperandException;
        }

        return array_sum($this->operands);
    }
}