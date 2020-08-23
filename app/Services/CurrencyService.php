<?php

namespace App\Services;

use App\Interfaces\ExchangeRates;
use Illuminate\Support\Facades\Session;

class CurrencyService
{
    /**
     * @var ExchangeRates
     */
    private $exchangeRates;

    /**
     * CurrencyService constructor.
     * @param ExchangeRates $exchangeRates
     */
    public function __construct(ExchangeRates $exchangeRates)
    {
        $this->exchangeRates = $exchangeRates;
    }


    /**
     * @param string $currency
     */
    public function changeCurrentCurrency(string $currency): void
    {
        Session::put('currency', $currency);
    }

    /**
     * @return string|null
     */
    public function getCurrentCurrency(): ?string
    {
        return $this->exchangeRates->getCurrentCurrency();
    }
}
