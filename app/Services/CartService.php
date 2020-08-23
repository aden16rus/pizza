<?php


namespace App\Services;


use App\Interfaces\Cart;
use App\Interfaces\ExchangeRates;
use App\Models\Product;

class CartService
{
    protected $cart;
    /**
     * @var ExchangeRates
     */
    private $exchangeRates;

    /**
     * CartService constructor.
     * @param Cart $cart
     * @param ExchangeRates $exchangeRates
     */
    public function __construct(Cart $cart, ExchangeRates $exchangeRates)
    {
        $this->cart = $cart;
        $this->exchangeRates = $exchangeRates;
    }

    /**
     * @param int $product_id
     * @param int $count
     *
     * @throw ModelNotFoundException
     *
     * @return mixed
     */
    public function addItem(int $product_id, int $count) :Product
    {
        $product = Product::findOrFail($product_id);
        $this->cart->addToCart($product, $count);
        return $product;
    }

    public function updateItem(int $product_id, int $count)
    {
        $product = Product::findOrFail($product_id);
        $this->cart->updateCart($product, $count);
        return $product;
    }

    /**
     * @param int $id
     */
    public function removeItem(int $id) :void
    {
        $this->cart->removeItem($id);
    }

    /**
     * Clear cart
     */
    public function clear() :void
    {
        $this->cart->clear();
    }

    /**
     * @return Cart|null
     */
    public function getCart(): ?Cart
    {
        return $this->cart;
    }

    public function calcTotal(): float
    {
        return $this->cart->getTotal();
    }

    public function cartItemsCount(): int
    {
        return $this->cart->quantity();
    }
}
