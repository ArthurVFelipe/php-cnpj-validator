<?php

namespace Avf\Cnpj;

class Calculator
{
    /**
     * Calcula um dígito verificador.
     */
    public static function calculateDigit(array $values, array $weights): int
    {
        $sum = 0;

        foreach ($values as $index => $value) {
            $sum += $value * $weights[$index];
        }

        $remainder = $sum % 11;

        return $remainder < 2 ? 0 : 11 - $remainder;
    }


    /**
     * Primeiro dígito verificador do CNPJ
     */
    public static function firstDigit(array $values): int
    {
        return self::calculateDigit(
            $values,
            [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2]
        );
    }


    /**
     * Segundo dígito verificador do CNPJ
     */
    public static function secondDigit(array $values): int
    {
        return self::calculateDigit(
            $values,
            [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2]
        );
    }
}