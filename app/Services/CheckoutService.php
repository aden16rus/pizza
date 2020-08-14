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
     * CheckoutService constructor.
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function storeOrder($request)
    {
        if (Auth::user()) {
            $this->order->user_id = Auth::user()->id;
        }
        $this->order->fill($request->all());
        $this->order->status = 'created';
        $this->order->products = json_encode(cart()->getCart());
        $this->order->save();

        return $this->order;
    }
}
