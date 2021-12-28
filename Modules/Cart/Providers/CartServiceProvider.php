<?php

namespace Modules\Cart\Providers;

use FleetCart\DBStorage;
use Illuminate\Support\Facades\Log;
use Modules\Cart\Cart;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton(Cart::class, function ($app) {

            $session_key = session()->getId();

            $storage = new DBStorage();

            return new Cart(
                $storage,
                // $app['session'],
                $app['events'],
                'cart',
                $session_key,
                config('fleetcart.modules.cart.config')
            );
        });

        $this->app->alias(Cart::class, 'cart');
    }
}
