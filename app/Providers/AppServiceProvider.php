<?php

namespace App\Providers;

use App\Implementations\DummyDelivery;
use App\Implementations\DummyExchange;
use App\Interfaces\Cart;
use App\Implementations\SimpleCart;
use App\Interfaces\Delivery;
use App\Interfaces\ExchangeRates;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Cart::class, function () {
            return new SimpleCart();
        });

        $this->app->bind(ExchangeRates::class, function () {
            return new DummyExchange();
        });

        $this->app->bind(Delivery::class, function () {
            return new DummyDelivery();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
