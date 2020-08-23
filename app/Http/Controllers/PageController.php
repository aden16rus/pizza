<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Contracts\Support\Renderable;

class PageController extends Controller
{
    /**
     * @var ProductService
     */
    private $productService;

    /**
     * Create a new controller instance.
     *
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $products = $this->productService->getAllProducts();
        return view('index', compact('products'));
    }
}
