<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutStoreRequest;
use App\Models\Order;
use App\Services\CheckoutService;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * @var CheckoutService
     */
    private $checkoutService;

    /**
     * OrderController constructor.
     * @param CheckoutService $service
     */
    public function __construct(CheckoutService $service)
    {
        $this->checkoutService = $service;
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @return void
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (cart()->getCart()) {
            return view('checkout.checkout');
        }

        return redirect()->route('cart.show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CheckoutStoreRequest $request
     * @return Response
     */
    public function store(CheckoutStoreRequest $request)
    {
        if (!cart()->getCart()) {
            return redirect()->route('cart.show');
        }
//        dd($request);
        $order = $this->checkoutService->storeOrder($request);
        cart()->clear();
        return view('checkout.checkout_finish', ['message' => 'Your order #'. $order->id .' accepted.']);
    }
}
