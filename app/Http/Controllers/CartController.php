<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Services\CartService;

class CartController extends Controller
{
    /**
     * @var CartService
     */
    private $cartService;

    /**
     * CartController constructor.
     * @param CartService $cartService
     */
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function addItem(AddToCartRequest $request)
    {
        try {
            $this->cartService->addItem($request);
        } catch (\Exception $e) {
            return back()->withErrors(['Product not found or not available']);
        }
        return back()->with(['message' => 'Cart updated']);
    }

    public function updateItem(AddToCartRequest $request)
    {
        try {
            $this->cartService->updateItem($request);
        } catch (\Exception $e) {
            return back()->withErrors(['Product not found or not available']);
        }
        return back()->with(['message' => 'Cart updated']);
    }

    public function removeItem($id)
    {
        $this->cartService->removeItem($id);
        return back()->with(['message' => 'Cart updated']);
    }
    public function show()
    {
        return view('cart');
    }

    public function clearCart()
    {
        $this->cartService->clear();
        return back()->with('message', 'Cart was cleared');
    }
}
