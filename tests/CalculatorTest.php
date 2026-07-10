<?php

namespace Avf\tests;

use Avf\Cnpj\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function test_calculate_cnpj_digits(): void
    {
        $numbers = [
            9,3,0,1,5,0,0,6,0,0,0,1
        ];

        $this->assertEquals(
            '13',
            Calculator::calculateDv($numbers)
        );
    }
}