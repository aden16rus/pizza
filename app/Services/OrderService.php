<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    /**
     * Get authorized user related orders
     * @return Collection|null
     */
    public function getCurrentUserOrders(): ?Collection
    {
        return Auth::user()->orders()->get();
    }
}
