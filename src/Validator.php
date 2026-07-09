<?php

namespace App\Cnpj;

class Validator
{
    public static function validate(string $cnpj): bool
    {
        $cnpj = strtoupper(
            preg_replace('/[^A-Z0-9]/', '', $cnpj)
        );

        if (strlen($cnpj) != 14) {
            return false;
        }

        $base = substr($cnpj, 0, 12);

        $values = array_map(
            fn($c) => self::charValue($c),
            str_split($base)
        );

        $dv1 = self::calculateDigit(
            $values,
            [5,4,3,2,9,8,7,6,5,4,3,2]
        );

        $values[] = $dv1;

        $dv2 = self::calculateDigit(
            $values,
            [6,5,4,3,2,9,8,7,6,5,4,3,2]
        );

        return
            $dv1 == (int)$cnpj[12] &&
            $dv2 == (int)$cnpj[13];
    }
}