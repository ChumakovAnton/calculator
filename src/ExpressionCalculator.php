<?php

declare(strict_types=1);

namespace ChumakovAnton\Calculator;

use ChumakovAnton\Calculator\Exception\InvalidArgumentException;

/**
 * Class ExpressionCalculator
 * @package ChumakovAnton\Calculator
 */
class ExpressionCalculator implements Calculator
{
    /**
     * @param string $input
     * @return float
     * @throws InvalidArgumentException
     * @throws Exception\DivisionByZeroException
     */
    public function process(string $input = ''): float
    {
        self::validateInput($input);
        $matches = [];
        preg_match_all('/(\-?\d+)([\+\-\*\/])?/', $input, $matches);
        $rootExpression = null;
        $expressionPoint = null;
        foreach ($matches[0] as $key => $value) {
            $expression = new ExpressionStackItem(new DefaultOperation($matches[2][$key]), (float)$matches[1][$key]);

            if (null === $rootExpression) {
                $rootExpression = $expression;
                $expressionPoint = $rootExpression;
                continue;
            }

            $isHigherPriority = $expression->getOperationPriority() > $expressionPoint->getOperationPriority();
            $isLowerPriority = $expression->getOperationPriority() < $expressionPoint->getOperationPriority();

            if ($isHigherPriority) {
                $expressionPoint = $expressionPoint->appendSubExpression($expression);
            } else {
                $expressionPoint->appendNextExpression($expression);

                if ($isLowerPriority) {
                    $expressionPoint = $expressionPoint->getParentExpression();
                }

                $expressionPoint->calculate();
            }
        }
        return $rootExpression->calculate();
    }

    /**
     * @param string $input
     * @throws InvalidArgumentException
     */
    protected static function validateInput(string $input): void
    {
        if (empty($input)) {
            throw new InvalidArgumentException('Empty input string');
        }

        if (preg_match('/([\+\-\*\/]){2,}/', $input) === 1) {
            throw new InvalidArgumentException('Double arithmetic operation');
        }

        if (!is_numeric($input[0]) && $input[0] !== '-') {
            throw new InvalidArgumentException('First symbol is incorrect');
        }

        if (!is_numeric($input[strlen($input) - 1])) {
            throw new InvalidArgumentException('Last symbol is incorrect. Empty right operand');
        }

        if (preg_match('/([^\d\+\-\*\/])+/', $input) === 1) {
            throw new InvalidArgumentException('Input string has incorrect characters');
        }
    }
}
