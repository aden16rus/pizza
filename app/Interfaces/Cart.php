<?php


namespace App\Interfaces;


use App\Models\Product;

interface Cart
{
    /**
     * Return array of cart items
     * @return array
     */
    public function getCart();

    /**
     * Add items to cart
     * @param Product $product
     * @param int $count
     */
    public function addToCart(Product $product, int $count): void;

    /**
     *  Change items count in the cart
     * @param Product $product
     * @param int $count
     */
    public function updateCart(Product $product, int $count): void;

    /**
     * Calculate total price for the cart
     * @return float
     */
    public function getTotal(): float;

    /**
     * Items quantity in the cart
     * @return int
     */
    public function quantity(): int;
}
