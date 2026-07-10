<?php

namespace Avf\Cnpj;

use http\Exception\InvalidArgumentException;

class Converter
{
    /**
     * Converte um caractere para seu valor numérico.
     */
    public static function charToNumber(string $char): int
    {
        $char = strtoupper($char);

        if (preg_match('/^\d$/', $char)) {
            return (int) $char;
        }

        if (preg_match('/^[A-Z]$/', $char)) {
            return ord($char) - 55;
        }

        throw new InvalidArgumentException(
            "Caractere '{$char}' inválido."
        );
    }

    /**
     * Converte uma sequência de caracteres em um array de inteiros.
     */
    public static function stringToNumbers(string $value): array
    {
        return array_map(
            self::charToNumber(...),
            str_split(strtoupper($value))
        );
    }
}