<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class CurrencyController extends Controller
{
    public function change(string $currency)
    {
        Session::put('currency', $currency);
        return back();
    }
}
