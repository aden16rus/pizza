<?php


namespace App\Implementations;


use App\Interfaces\Delivery;

class DummyDelivery implements Delivery
{

    /**
     * @param int $quantity
     * @return float
     */
    public function calculateCost(int $quantity): float
    {
        return $quantity * 2;
    }
}
