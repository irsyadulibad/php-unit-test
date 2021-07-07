<?php
namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandException;

class Division extends OperationAbstract implements OperandInterface
{
    public function calculate(): float
    {
        if(count($this->operands) < 1) {
            throw new NoOperandException;
        }

        return array_reduce(array_filter($this->operands), function($a, $b) {
            if(!is_null($a) && !is_null($b)) return $a / $b;

            return $b;
        }, null);
    }
}