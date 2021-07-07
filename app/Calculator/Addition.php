<?php
namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandException;

class Addition implements OperandInterface
{
    protected $operands = [];

    public function setOperands(array $operands)
    {
        $this->operands = $operands;
        return $operands;
    }

    public function calculate()
    {
        if(count($this->operands) < 1) {
            throw new NoOperandException;
        }

        return array_sum($this->operands);
    }
}