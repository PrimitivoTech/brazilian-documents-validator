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

it('should ensure that `Validator::isCPF` validate cpf number', function (string $value) {
    expect(Validator::isCPF($value))
        ->toBeTruthy();
})->with([
    '597.865.146-96',
    '888.258.819-08',
    '523.876.586-04',
    '87782852676',
    '40804768250',
    '16391815801'
]);

it('should ensure that `Validator::isCNPJ` returns false if CNPJ length is less than 14', function (string $cnpj) {
    expect(Validator::isCNPJ($cnpj))
        ->toBeFalsy();
})->with([
    '59.786.514/',
    '88.825.880/0001',
    '52.387.658/0001-0',
]);

it('should ensure that `Validator::isCNPJ` returns false if a combination of equal numbers is passed', function (string $cpf) {
    expect(Validator::isCPF($cpf))
        ->toBeFalsy();
})->with([
    '11.111.111/1111-11',
    '22.222.222/2222-22',
    '33.333.333/3333-33',
    '44.444.444/4444-44',
    '55.555.555/5555-55',
    '66.666.666/6666-66',
    '77.777.777/7777-77',
    '88.888.888/8888.88',
    '99.999.999/9999.99',
    '00.000.000/0000-00',
]);

it('should ensure that `Validator::isCNPJ` validate cnpj number', function (string $value) {
    expect(Validator::isCNPJ($value))
        ->toBeTruthy();
})->with([
    '67.926.241/0001-37',
    '32.466.798/0001-58',
    '16.847.321/0001-66',
    '42258663000150',
    '08049847000172',
    '27612438000187',
]);