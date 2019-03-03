<?php

declare(strict_types=1);

namespace ChumakovAnton\Calculator\Test;

use ChumakovAnton\Calculator\Exception\DivisionByZeroException;
use ChumakovAnton\Calculator\Exception\InvalidArgumentException;
use ChumakovAnton\Calculator\ExpressionCalculator;

class CalculatorTest extends \PHPUnit\Framework\TestCase
{
    public function invalidInputString(): array
    {
        return [
            'empty' => [''],
            'double-operation' => ['4++5/2'],
            'last-symbol-operation' => ['1234+453-'],
            'first-symbol-operation' => ['*1234+453'],
            'first-symbol-operation-div' => ['/1234+453'],
            'alphabetic-symbols' => ['a1234+453'],
        ];
    }

    public function validInputString(): array
    {
        return [
            'basic-operations' => ['1+2-3*4/6'],
            'single' => ['245'],
            'first-operation-minus' => ['-5+4/2'],
        ];
    }

    public function divisionByZero(): array
    {
        return [
            'zero-div' => ['5+3*2/0+6'],
        ];
    }

    /**
     * @dataProvider invalidInputString
     * @param string $input
     * @throws InvalidArgumentException
     * @throws DivisionByZeroException
     */
    public function testExecuteRaisesExceptionOnInvalidInputString(string $input): void
    {
        $this->expectException(InvalidArgumentException::class);
        $calculator = new ExpressionCalculator();
        $calculator->process($input);
    }

    /**
     * @dataProvider divisionByZero
     * @param string $input
     * @throws InvalidArgumentException
     * @throws DivisionByZeroException
     */
    public function testExecuteRaisesExceptionOnDivisionByZero(string $input): void
    {
        $this->expectException(DivisionByZeroException::class);
        $calculator = new ExpressionCalculator();
        $calculator->process($input);
    }

    /**
     * @dataProvider validInputString
     * @param string $input
     * @throws InvalidArgumentException
     * @throws DivisionByZeroException
     */
    public function testExecuteSucceedsOnValidInputString(string $input): void
    {
        $calculator = new ExpressionCalculator();
        $result = $calculator->process($input);
        $this->assertIsFloat($result);
    }
}
