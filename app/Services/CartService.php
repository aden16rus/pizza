<?php


namespace App\Services;


use App\Interfaces\Cart;
use App\Models\Product;

class CartService
{
    protected $cart;

    /**
     * CartService constructor.
     * @param $cart
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function addItem($request)
    {
        $product = Product::findOrFail($request->product_id);
        $this->cart->addToCart($product, $request->count);
    }

    public function updateItem($request)
    {
        $product = Product::findOrFail($request->product_id);
        $this->cart->updateCart($product, $request->count);
    }

    public function removeItem(int $id)
    {
        $this->cart->removeItem($id);
    }

    public function clear()
    {
        $this->cart->clear();
    }
}
