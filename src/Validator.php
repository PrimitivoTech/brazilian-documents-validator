<?php

declare(strict_types = 1);

namespace Primitivo\BrazilianDocuments;

class Validator
{
    public static function isCPF(string $cpf): bool
    {
        $cpf = preg_replace('/\D/', '', $cpf);

        if (strlen($cpf) != 11) {
            return false;
        }

        for ($x = 0; $x < 10; $x++) {
            if ($cpf == str_repeat((string)$x, 11)) {
                return false;
            }
        }

        for ($t = 9; $t < 11; $t++) {
            $d = 0;

            for ($c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }

            $d = ((10 * $d) % 11) % 10;

            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }
}
