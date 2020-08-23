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
            $product = $this->cartService->addItem($request->product_id, $request->count);
        } catch (\Exception $e) {
            return back()->withErrors(['Product not found or not available']);
        }
        return back()->with(['message' => 'Product '.$product->title.' added to cart']);
    }

    public function updateItem(AddToCartRequest $request)
    {
        try {
            $this->cartService->updateItem($request->product_id, $request->count);
        } catch (\Exception $e) {
            return back()->withErrors(['Product not found or not available']);
        }
        return back()->with(['message' => 'Cart updated']);
    }

    public function removeItem($id)
    {
        $this->cartService->removeItem($id);
        return back()->with(['message' => 'Product removed from cart']);
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
