<?php

namespace App\Controllers;


use App\Utils\ControllerException;


class ExchangeController {
    private $symbols = [
        "BRL" => "R$",
        "USD" => "$",
        "EUR" => "€"
    ];



    public function exchange(?string $value, ?string $from, ?string $to, ?string $rate) {
        if (!is_numeric($value)
        || !is_numeric($rate)
        || !isset($this->symbols[$from])
        || !isset($this->symbols[$to])
        || $value < 0
        || $rate < 0) {
            throw new ControllerException(400, "Requisição inválida");
        }

        return [
            "valorConvertido" => floatval($value) * floatval($rate),
            "simboloMoeda" => $this->symbols[$to]
        ];
    }
}