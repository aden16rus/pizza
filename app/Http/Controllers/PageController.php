<?php

namespace App\Http\Controllers;

use App\Interfaces\Cart;
use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        //echo phpinfo();
//        Session::flush();
        $products = Product::all();
        return view('index', compact('products'));
    }
}
