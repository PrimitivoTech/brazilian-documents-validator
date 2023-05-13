<?php

use Primitivo\BrazilianDocuments\Validator;

it('should ensure that `Validator::isCPF` returns false if CPF length is less than 11', function (string $cpf) {
    expect(Validator::isCPF($cpf))
        ->toBeFalsy();
})->with([
    '597.865',
    '888.258.819',
    '523.876.586-0',
]);

it('should ensure that `Validator::isCPF` returns false if a combination of equal numbers is passed', function (string $cpf) {
    expect(Validator::isCPF($cpf))
        ->toBeFalsy();
})->with([
    '111.111.111-11',
    '222.222.222-22',
    '333.333.333-33',
    '444.444.444-44',
    '555.555.555-55',
    '666.666.666-66',
    '777.777.777-77',
    '888.888.888.88',
    '999.999.999.99',
    '000.000.000-00',
]);

it('should validate cpf number', function (string $value, bool $expected) {
    expect(Validator::isCPF($value))
        ->toBe($expected);
})->with([
    ['597.865.146-96', true],
    ['888.258.819-08', true],
    ['523.876.586-04', true],
    ['597.865.147-96', false],
    ['888.258.818-08', false],
    ['523.876.587-04', false],
]);
