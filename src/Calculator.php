<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 2019-03-03
 * Time: 07:43
 */

namespace ChumakovAnton\Calculator;

/**
 * Interface Calculator
 * @package ChumakovAnton\Calculator
 */
interface Calculator
{
    public function process(string $input = ''): float;
}
