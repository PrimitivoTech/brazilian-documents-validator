<?php

declare(strict_types = 1);

namespace Primitivo\BrazilianDocuments;

class Validator
{
    public static function isCPF(string $cpf): bool
    {
        $cpf = preg_replace('/\D/', '', $cpf);

        if (strlen($cpf) != 11 || str_repeat($cpf[0], 11) == $cpf) {
            return false;
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

    public static function isCNPJ(string $cnpj): bool
    {
        $cnpj = preg_replace('/\D/', '', $cnpj);

        if (strlen($cnpj) != 14 || str_repeat($cnpj[0], 14) == $cnpj) {
            return false;
        }

        for ($t = 12; $t < 14; $t++) {
            $d = 0;
            $c = 0;

            for ($m = $t - 7; $m >= 2; $m--, $c++) {
                $d += $cnpj[$c] * $m;
            }

            for ($m = 9; $m >= 2; $m--, $c++) {
                $d += $cnpj[$c] * $m;
            }

            $d = ((10 * $d) % 11) % 10;

            if ($cnpj[$c] != $d) {
                return false;
            }
        }

        return true;
    }
}
