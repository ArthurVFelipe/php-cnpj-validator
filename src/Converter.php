<?php

namespace Avf\Cnpj;

class Converter
{
    /**
     * Converte um caractere do CNPJ para seu valor numérico.
     *
     * Ex:
     * A = 10
     * B = 11
     * Z = 35
     * 1 = 1
     */
    public static function charToNumber(string $char): int
    {
        $char = strtoupper($char);

        if (is_numeric($char)) {
            return (int) $char;
        }

        return ord($char) - 55;
    }


    /**
     * Converte uma string completa do CNPJ.
     *
     * Ex:
     * AB1C
     *
     * Retorna:
     * [10,11,1,12]
     */
    public static function stringToNumbers(string $value): array
    {
        return array_map(
            fn ($char) => self::charToNumber($char),
            str_split(strtoupper($value))
        );
    }
}