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
    protected $subExpression;

    /** @var ExpressionStackItem */
    protected $nextExpression;

    /** @var ExpressionStackItem */
    protected $parentExpression;

    public function __construct(float $operand = 0, string $operation = '')
    {
        $this->operand = $operand;
        $this->operation = new Operation($operation);
    }

    public function getOperationPriority(): int
    {
        return $this->operation->getPriority();
    }

    /**
     * @return ExpressionStackItem
     */
    public function getNextExpression(): ?ExpressionStackItem
    {
        return $this->nextExpression;
    }

    /**
     * @param ExpressionStackItem $nextExpression
     * @return ExpressionStackItem|null
     */
    public function setNextExpression(?ExpressionStackItem $nextExpression): ?ExpressionStackItem
    {
        $this->nextExpression = $nextExpression;
        return $this->nextExpression;
    }

    /**
     * @return ExpressionStackItem
     */
    public function getParentExpression(): ?ExpressionStackItem
    {
        return $this->parentExpression;
    }

    /**
     * @return float
     */
    protected function getOperand(): float
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
     * @param Operation $operation
     */
    public function setOperation(Operation $operation): void
    {
        $this->operation = $operation;
    }

    /**
     * @return Operation|null
     */
    public function getOperation(): ?Operation
    {
        return $this->operation;
    }

    /**
     * @return null|ExpressionStackItem
     */
    public function getSubExpression(): ?ExpressionStackItem
    {
        return $this->subExpression;
    }

    /**
     * @param null|ExpressionStackItem $subExpression
     * @return ExpressionStackItem|null
     */
    protected function setSubExpression(?ExpressionStackItem $subExpression): ?ExpressionStackItem
    {
        $this->subExpression = $subExpression;
        return $this->subExpression;
    }

    protected function excludeSubExpression(): void
    {
        $this->setSubExpression($this->subExpression->getSubExpression());
    }

    protected function excludeNextExpression(): void
    {
        $this->setSubExpression($this->nextExpression->getSubExpression());
        $this->setNextExpression($this->nextExpression->getNextExpression());
    }

    /**
     * @param ExpressionStackItem $expressionStackItem
     * @return ExpressionStackItem|null
     */
    public function appendSubExpression(ExpressionStackItem $expressionStackItem): ?ExpressionStackItem
    {
        $expressionStackItem->parentExpression = $this;
        return $this->setSubExpression($expressionStackItem);
    }

    /**
     * @param ExpressionStackItem $expressionStackItem
     * @return ExpressionStackItem|null
     */
    public function appendNextExpression(ExpressionStackItem $expressionStackItem): ?ExpressionStackItem
    {
        $expressionStackItem->parentExpression = $this;
        return $this->setNextExpression($expressionStackItem);
    }

    /**
     * @return float
     * @throws Exception\DivisionByZeroException
     */
    public function calculate(): float
    {
        while (!empty($this->nextExpression) || !empty($this->subExpression)) {
            if (!empty($this->subExpression)) {
                $this->subExpression->calculate();
                $this->executeOperation($this->subExpression);
                $this->excludeSubExpression();
            }
            if (!empty($this->nextExpression)) {
                $this->executeOperation($this->nextExpression);
                $this->excludeNextExpression();
            }
        }
        return $this->operand;
    }

    /**
     * @param ExpressionStackItem $expressionStackItem
     * @throws Exception\DivisionByZeroException
     */
    protected function executeOperation(ExpressionStackItem $expressionStackItem): void
    {
        $result = $this->operation->execute($this->operand, $expressionStackItem->getOperand());
        $this->setOperand($result);
        $this->setOperation($expressionStackItem->getOperation());
    }
}
