<?php

namespace App\Services;

use App\Interfaces\Delivery;

class DeliveryService
{
    /**
     * @var Delivery
     */
    private $delivery;

    /**
     * DeliveryService constructor.
     * @param Delivery $delivery
     */
    public function __construct(Delivery $delivery)
    {
        $this->delivery = $delivery;
    }

    /**
     * @param int $itemsCount
     * @return float
     */
    public function getDeliveryCost(int $itemsCount): float
    {
        return $this->delivery->calculateCost($itemsCount);
    }
}
