<?php

namespace App\Implementations;

use App\Interfaces\ExchangeRates;

class DummyExchange implements ExchangeRates
{

    public function getCurrentCurrency(): string
    {
        return session('currency')??'USD';
    }

    public function getCurrencyRate(): float
    {
        return (session('currency') && session('currency') == 'EUR')?0.84:1;
    }
}
