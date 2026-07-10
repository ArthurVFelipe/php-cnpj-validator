<?php

namespace Avf\Cnpj\Tests;

use Avf\Cnpj\Validator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
    public function test_valid_cnpj(): void
    {
        $this->assertTrue(
            Validator::isValid('93.015.006/0001-13')
        );
    }


    public function test_invalid_cnpj(): void
    {
        $this->assertFalse(
            Validator::isValid('93.015.006/0001-14')
        );
    }


    public function test_invalid_length(): void
    {
        $this->assertFalse(
            Validator::isValid('123')
        );
    }


    public static function validCnpjs(): array
    {
        return [
            ['93.015.006/0001-13'],
            ['11222333000181'],
            ['112223AA000151'],
        ];
    }


    #[DataProvider('validCnpjs')]
    public function test_valid_cnpjs(string $cnpj): void
    {
        $this->assertTrue(
            Validator::isValid($cnpj)
        );
    }


    public function test_invalid_alphanumeric_cnpj(): void
    {
        $this->assertFalse(
            Validator::isValid('112223AA000152')
        );
    }
}