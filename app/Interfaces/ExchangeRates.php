<?php


namespace App\Interfaces;


interface ExchangeRates
{
    /**
     * Resolve chosen currency
     * @return string
     */
    public function getCurrentCurrency(): string;

    /**
     * Currency convert rate from default currency
     * @return float
     */
    public function getCurrencyRate(): float;
}
