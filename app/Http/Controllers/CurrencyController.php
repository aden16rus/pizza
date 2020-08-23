<?php

namespace App\Http\Controllers;

use App\Services\CurrencyService;

class CurrencyController extends Controller
{
    /**
     * @var CurrencyService
     */
    private $service;

    /**
     * CurrencyController constructor.
     * @param CurrencyService $service
     */
    public function __construct(CurrencyService $service)
    {
        $this->service = $service;
    }

    public function change(string $currency)
    {
        $this->service->changeCurrentCurrency($currency);
        return back();
    }
}
