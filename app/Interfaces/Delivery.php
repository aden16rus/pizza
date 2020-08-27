<?php


namespace App\Interfaces;

interface Delivery
{
    /**
     * Calculate Delivery cost by items count
     * @param int $quantity
     * @return float
     */
    public function calculateCost(int $quantity): float;
}
