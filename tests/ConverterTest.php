<?php

namespace Avf\tests;

use Avf\Cnpj\Converter;
use PHPUnit\Framework\TestCase;

class ConverterTest extends TestCase
{
    public function test_convert_letter_to_number(): void
    {
        $this->assertEquals(10, Converter::charToNumber('A'));
        $this->assertEquals(11, Converter::charToNumber('B'));
        $this->assertEquals(35, Converter::charToNumber('Z'));
    }

    public function test_convert_number_character(): void
    {
        $this->assertEquals(1, Converter::charToNumber('1'));
        $this->assertEquals(9, Converter::charToNumber('9'));
    }
}