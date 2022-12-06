<?php

namespace Modules\Cart\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Cart\Facades\Cart;

class RedirectIfCartIsEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        // $cart = Cart::instance();

        // $cart->session('88uuiioo99888');

        // // dd($cart);

        if (Cart::isEmpty()) {

            if($request->expectsJson()){
                return response(['message' => 'Cart is empty', 'errors' => [
                    'cart' => "Cart is empty",
                ]], 422);
            }

            return redirect()->route('cart.index');
        }

        return $next($request);
    }
}
