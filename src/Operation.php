<?php

declare(strict_types=1);

namespace ChumakovAnton\Calculator;

/**
 * Interface Operation
 * @package ChumakovAnton\Calculator
 */
interface Operation
{
    public function execute(float $leftOperand, float $rightOperand);
}
