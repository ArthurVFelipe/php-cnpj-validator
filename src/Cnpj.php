<?php

namespace App\Cnpj;

class Cnpj
{
    public static function isValid(string $cnpj): bool
    {
        return Validator::validate($cnpj);
    }

    public static function format(string $cnpj): string
    {
        return Formatter::format($cnpj);
    }

    public static function onlyChars(string $cnpj): string
    {
        return strtoupper(
            preg_replace('/[^A-Z0-9]/i', '', $cnpj)
        );
    }
}