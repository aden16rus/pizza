<?php

namespace App\Http\Middleware;

use App\Interfaces\Cart;
use Closure;

class CartInitMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        app(Cart::class)->init();
        return $next($request);
    }
}
