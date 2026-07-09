<?php

namespace Avf\tests;

use Avf\Cnpj\Converter;
use PHPUnit\Framework\TestCase;

class ConverterTest extends TestCase
{
    public function test_converte_letra_A()
    {
        $this->assertEquals(
            10,
            Converter::charToNumber('A')
        );
    }


    public function test_converte_letra_Z()
    {
        $this->assertEquals(
            35,
            Converter::charToNumber('Z')
        );
    }


    public function test_converte_numero()
    {
        $this->assertEquals(
            5,
            Converter::charToNumber('5')
        );
    }


    public function test_converte_cnpj()
    {
        $this->assertEquals(
            [10,11,1,12],
            Converter::stringToNumbers('AB1C')
        );
    }
}