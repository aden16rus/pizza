<?php

namespace App\Implementations;

use App\Interfaces\Cart;
use Illuminate\Support\Facades\Session;

class SimpleCart implements Cart
{
    private $cart;

    public function init()
    {
        $this->cart = session('cart');
    }

    public function getCart()
    {
        return $this->cart;
    }

    public function addToCart($product, $count): void
    {
        if ($this->cart && array_key_exists($product->id, $this->cart)) {
            $this->cart[$product->id]['count'] += $count;
        } else {
            $this->cart[$product->id] = [
                'count' => $count,
                'product' => $product
            ];
        }

        Session::put('cart', $this->cart);
    }

    public function updateCartItem($product, $count): void
    {
        if (!$count || $count == 0) {
            unset($this->cart[$product->id]);
        } else {
            $this->cart[$product->id] = [
                'count' => $count,
                'product' => $product
            ];
        }

        Session::put('cart', $this->cart);
    }

    public function removeItem($id)
    {
        if (key_exists($id, $this->cart)) {
            unset($this->cart[$id]);
        }

        Session::put('cart', $this->cart);
    }

    public function updateCart($product, $count): void
    {
        // TODO: Implement updateCart() method.
    }

    public function getTotal(): float
    {
        $total = 0;
        foreach($this->cart as $item) {
                $total += $item['count'] * $item['product']->price;
        }

        return $total;
    }

    public function clear()
    {
        Session::remove('cart');
    }

    public function quantity(): int
    {
        $total = 0;
        if ($this->cart) {
            foreach($this->cart as $item) {
                $total += $item['count'];
            }
        }

        return $total;
    }
}
