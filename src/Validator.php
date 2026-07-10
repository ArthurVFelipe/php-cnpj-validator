<?php

namespace Avf\Cnpj;

class Validator
{
    public static function isValid(string $cnpj): bool
    {
        $cnpj = Formatter::removeMask($cnpj);

        if (strlen($cnpj) !== 14) {
            return false;
        }

        try {
            $numbers = array_map(
                fn($char) => Converter::charToNumber($char),
                str_split($cnpj)
            );
        } catch (\InvalidArgumentException $e) {
            return false;
        }

        // Remove os dois dígitos verificadores
        $base = array_slice($numbers, 0, 12);

        // Calcula os DVs
        $dv = Calculator::calculateDv($base);

        // Compara com os DVs informados
        return $dv === "{$numbers[12]}{$numbers[13]}";
    }
}