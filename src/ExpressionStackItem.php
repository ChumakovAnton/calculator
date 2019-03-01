<?php

declare(strict_types=1);

namespace ChumakovAnton\Calculator;

class ExpressionStackItem
{
    /** @var float */
    protected $operand;

    /** @var Operation */
    protected $operation;

    /** @var ExpressionStackItem */
    protected $nextExpression;

    public function __construct()
    {
        $this->operand = 0;
        $this->operation = new Operation('+');
    }

    public function calculate(): float
    {
        while (!empty($this->nextExpression)) {
            if ($this->getPriority() >= $this->nextExpression->getPriority()) {
                $rightOperand = $this->nextExpression->operand;
            } else {
                $rightOperand = $this->nextExpression->calculate();
            }
            $newOperand = $this->operation->execute($this->operand, $rightOperand);
            $this->setOperand($newOperand);
            $this->setOperation($this->nextExpression->operation);
            $this->excludeNextExpression();
        }
        return $this->operand;
    }

    public function getPriority(): int
    {
        if (empty($this->operation)) {
            return -1;
        }
        return $this->operation->getPriority();
    }

    /**
     * @return float
     */
    public function getOperand(): float
    {
        return $this->operand;
    }

    /**
     * @param float $operand
     */
    public function setOperand(float $operand): void
    {
        $this->operand = $operand;
    }

    /**
     * @return null|ExpressionStackItem
     */
    public function getNextExpression(): ?ExpressionStackItem
    {
        return $this->nextExpression;
    }

    /**
     * @param null|ExpressionStackItem $nextExpression
     * @return ExpressionStackItem|null
     */
    public function setNextExpression(?ExpressionStackItem $nextExpression): ?ExpressionStackItem
    {
        $this->nextExpression = $nextExpression;
        return $this->nextExpression;
    }

    protected function excludeNextExpression(): void
    {
        $this->setNextExpression($this->nextExpression->getNextExpression());
    }

    /**
     * @param Operation $operation
     */
    public function setOperation(Operation $operation): void
    {
        $this->operation = $operation;
    }
}
