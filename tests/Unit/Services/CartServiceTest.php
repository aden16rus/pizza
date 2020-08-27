<?php

namespace Tests\Unit\Services;

use App\Implementations\DummyExchange;
use App\Implementations\SimpleCart;
use App\Services\CartService;
use PHPUnit\Framework\TestCase;

class CartServiceTest extends TestCase
{

    /**
     * @var CartService
     */
    private $cartService;

    public function setUp(): void
    {
        parent::setUp();

        $this->cartService = new CartService(new SimpleCart(), new DummyExchange());
    }
    public function testAddItem()
    {
        $product = $this->cartService->addItem(4, 1);

//        dd($this->cartService->getCart());
    }
}
