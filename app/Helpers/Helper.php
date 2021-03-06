<?php

function cart()
{
    return app(App\Interfaces\Cart::class);
}

function deliveryCost()
{
    return cart()->quantity() * 2;
}
function calcPrice($price)
{
    return $price * app(App\Interfaces\ExchangeRates::class)->getCurrencyRate();
}

function currency()
{
    return app(App\Interfaces\ExchangeRates::class)->getCurrentCurrency();
}

