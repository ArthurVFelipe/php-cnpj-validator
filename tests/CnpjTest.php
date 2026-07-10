<?php

namespace Avf\Cnpj\Tests;

use Avf\Cnpj\Cnpj;
use PHPUnit\Framework\TestCase;

class CnpjTest extends TestCase
{
    public function test_is_valid(): void
    {
        $this->assertTrue(
            Cnpj::isValid('93.015.006/0001-13')
        );
    }


    public function test_calculate_dv(): void
    {
        $this->assertEquals(
            '13',
            Cnpj::calculateDv('930150060001')
        );
    }


    public function test_format(): void
    {
        $this->assertEquals(
            '93.015.006/0001-13',
            Cnpj::format('93015006000113')
        );
    }


    public function test_remove_mask(): void
    {
        $this->assertEquals(
            '93015006000113',
            Cnpj::normalize('93.015.006/0001-13')
        );
    }
}