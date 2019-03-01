<?php

declare(strict_types=1);

namespace ChumakovAnton\Calculator;

class Calculator
{
    /**
     * @param string $input
     * @return float
     */
    public function execute(string $input = ''): float
    {
        $matches = [];
        preg_match_all('/(\-?\d+)([\+\-\*\/])?/', $input, $matches);
        $expression = new ExpressionStackItem();
        $nextExpression = $expression;
        foreach ($matches[0] as $key => $value) {
            $nextExpression->setNextExpression(new ExpressionStackItem());
            $nextExpression = $nextExpression->getNextExpression();
            $nextExpression->setOperand($matches[1][$key]);
            $nextExpression->setOperation(new Operation($matches[2][$key]));
        }
        $result = $expression->calculate();
        return $result;
    }
}
