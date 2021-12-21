<?php

namespace Modules\Cart\Http\Controllers;
use Modules\Cart\Facades\Cart;

class CartController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->expectsJson()){

            return $cart = Cart::instance();

        }

        return view('public.cart.index');
    }



}
