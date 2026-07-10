<?php

namespace Avf\Cnpj\Tests;

use Avf\Cnpj\Formatter;
use PHPUnit\Framework\TestCase;

class FormatterTest extends TestCase
{
    public function test_remove_mask(): void
    {
        $cnpj = '93.015.006/0001-13';

        $this->assertEquals(
            '93015006000113',
            Formatter::removeMask($cnpj)
        );
    }

    public function test_format_cnpj(): void
    {
        $cnpj = '93015006000113';

        $this->assertEquals(
            '93.015.006/0001-13',
            Formatter::format($cnpj)
        );
    }
}