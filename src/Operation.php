<?php

declare(strict_types=1);

namespace ChumakovAnton\Calculator;

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
