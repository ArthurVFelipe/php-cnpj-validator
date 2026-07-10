<?php

namespace Avf\Cnpj;

class Formatter
{
    private const REGEX_MASK = '/[.\/-]/';

    public static function removeMask(string $cnpj): string
    {
        return strtoupper(
            preg_replace(self::REGEX_MASK, '', trim($cnpj))
        );
    }

    public static function format(string $cnpj): string
    {
        $cnpj = self::removeMask($cnpj);

        if (strlen($cnpj) !== 14) {
            return $cnpj;
        }

        return sprintf(
            '%s.%s.%s/%s-%s',
            substr($cnpj, 0, 2),
            substr($cnpj, 2, 3),
            substr($cnpj, 5, 3),
            substr($cnpj, 8, 4),
            substr($cnpj, 12, 2)
        );
    }
}