<?php

namespace App\Services;

use App\Interfaces\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CheckoutService
{
    /**
     * @var Order
     */
    private $order;
    /**
     * @var CartService
     */
    private $cartService;
    /**
     * @var CurrencyService
     */
    private $currencyService;

    /**
     * CheckoutService constructor.
     * @param Order $order
     * @param CartService $cartService
     * @param CurrencyService $currencyService
     */
    public function __construct(Order $order, CartService $cartService, CurrencyService $currencyService)
    {
        $this->order = $order;
        $this->cartService = $cartService;
        $this->currencyService = $currencyService;
    }

    public function storeOrder(string $name, string $address)
    {
        if (Auth::user()) {
            $this->order->user_id = Auth::user()->id;
        }
        $this->order->name = $name;
        $this->order->address = $address;
        $this->order->total = $this->cartService->calcTotal();
        $this->order->delivery = $this->getDeliveryPrice($this->cartService->cartItemsCount());
        $this->order->currency = $this->currencyService->getCurrentCurrency();
        $this->order->status = 'created';
        $this->order->products = json_encode($this->cartService->getCart()->getItems());
        $this->order->save();

        return $this->order;
    }

    /**
     * @param int $countItems
     * @return int
     *
     * @TODO refactor to delivery service
     */
    public function getDeliveryPrice(int $countItems): int
    {
        return $countItems * 2;
    }
}
