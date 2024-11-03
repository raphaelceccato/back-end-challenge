<?php

namespace App\Controllers;


class ExchangeController {
    private $symbols = [
        "BRL" => "R$",
        "USD" => "$",
        "EUR" => "€"
    ];



    public function exchange(?string $value, ?string $from, ?string $to, ?string $rate) {
        return [
            "valorConvertido" => floatval($value) * floatval($rate),
            "simboloMoeda" => $this->symbols[$to]
        ];
    }
}