<?php

declare(strict_types=1);

namespace ChumakovAnton\Calculator;

use ChumakovAnton\Calculator\Exception\DivisionByZeroException;

class Operation
{
    protected const OPERATION_PRIORITIES = [
        0 => ['+', '-'],
        1 => ['*', '/'],
    ];

    protected $operation;

    public function __construct(string $operation)
    {
        $this->operation = $operation;
    }

    /**
     * @param float $leftOperand
     * @param float $rightOperand
     * @return float|int
     * @throws DivisionByZeroException
     */
    public function execute(float $leftOperand, float $rightOperand)
    {
        $result = 0;
        switch ($this->operation) {
            case '+':
                $result = $leftOperand + $rightOperand;
                break;
            case '-':
                $result = $leftOperand - $rightOperand;
                break;
            case '*':
                $result = $leftOperand * $rightOperand;
                break;
            case '/':
                if (empty($rightOperand)) {
                    throw new DivisionByZeroException('Division by zero');
                }
                $result = $leftOperand / $rightOperand;
                break;
        }
        return $result;
    }

    public function getPriority(): int
    {
        foreach (self::OPERATION_PRIORITIES as $priority => $operations) {
            if (in_array($this->operation, $operations, true)) {
                return $priority;
            }
        }
        return -1;
    }
}
