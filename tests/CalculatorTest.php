<?php

namespace Avf\tests;

use Avf\Cnpj\Calculator;
use Avf\Cnpj\Converter;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function test_calcula_primeiro_digito()
    {
        $values = Converter::stringToNumbers(
            '112223330001'
        );

        $this->assertEquals(
            8,
            Calculator::firstDigit($values)
        );
    }


    public function test_calcula_segundo_digito()
    {
        $values = Converter::stringToNumbers(
            '112223330001'
        );

        $values[] = Calculator::firstDigit($values);

        $this->assertEquals(
            9,
            Calculator::secondDigit($values)
        );
    }
}