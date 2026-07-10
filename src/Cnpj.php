<?php

namespace Avf\Cnpj;

class Cnpj
{
    public static function isValid(string $cnpj): bool
    {
        return Validator::isValid($cnpj);
    }

    public static function calculateDv(string $cnpj): string
    {
        $cnpj = Formatter::removeMask($cnpj);

        $numbers = array_map(
            fn($char) => Converter::charToNumber($char),
            str_split(substr($cnpj, 0, 12))
        );

        return Calculator::calculateDv($numbers);
    }

    public static function normalize(string $cnpj): string
    {
        return Formatter::removeMask($cnpj);
    }

    public static function format(string $cnpj): string
    {
        return Formatter::format($cnpj);
    }
}