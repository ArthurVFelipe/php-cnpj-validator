<?php

namespace Avf\Cnpj;

class Calculator
{
    private const FIRST_WEIGHTS = [
        5,4,3,2,9,8,7,6,5,4,3,2
    ];

    private const SECOND_WEIGHTS = [
        6,5,4,3,2,9,8,7,6,5,4,3,2
    ];

    /**
     * Calcula os dois dígitos verificadores.
     */
    public static function calculateDv(array $numbers): string
    {
        $dv1 = self::calculateFirstDigit($numbers);

        $numbers[] = $dv1;

        $dv2 = self::calculateSecondDigit($numbers);

        return "{$dv1}{$dv2}";
    }

    private static function calculateFirstDigit(array $numbers): int
    {
        return self::calculateDigit(
            $numbers,
            self::FIRST_WEIGHTS
        );
    }

    private static function calculateSecondDigit(array $numbers): int
    {
        return self::calculateDigit(
            $numbers,
            self::SECOND_WEIGHTS
        );
    }

    private static function calculateDigit(
        array $numbers,
        array $weights
    ): int {
        $sum = 0;

        foreach ($numbers as $index => $number) {
            $sum += $number * $weights[$index];
        }

        $rest = $sum % 11;

        return $rest < 2
            ? 0
            : 11 - $rest;
    }
}