<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutStoreRequest;
use App\Models\Order;
use App\Services\CartService;
use App\Services\CheckoutService;
use App\Services\OrderService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * @var CheckoutService
     */
    private $checkoutService;
    /**
     * @var CartService
     */
    private $cartService;
    /**
     * @var OrderService
     */
    private $orderService;

    /**
     * OrderController constructor.
     * @param CheckoutService $service
     * @param CartService $cartService
     * @param OrderService $orderService
     */
    public function __construct(CheckoutService $service, CartService $cartService, OrderService $orderService)
    {
        $this->checkoutService = $service;
        $this->cartService = $cartService;
        $this->orderService = $orderService;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return RedirectResponse|Renderable
     */
    public function create()
    {
        if ($this->cartService->getCart()) {
            return view('checkout.checkout');
        }

        return redirect()->route('cart.show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CheckoutStoreRequest $request
     * @return RedirectResponse|Renderable
     */
    public function store(CheckoutStoreRequest $request)
    {
        if (!$this->cartService->getCart()) {
            return redirect()->route('cart.show');
        }

        $order = $this->checkoutService->storeOrder($request->name, $request->address);
        $this->cartService->clear();
        return view('checkout.checkout_finish', ['message' => 'Your order #'. $order->id .' accepted.']);
    }

    /**
     * @return View
     */
    public function orderList()
    {
        $orders = $this->orderService->getCurrentUserOrders();
        return view('orders', compact('orders'));
    }
}
