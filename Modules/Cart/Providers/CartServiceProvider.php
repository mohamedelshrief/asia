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

        $storage = new DBStorage();

        $session_key = session()->getId();

        $session_key = "default";

        // Log::info($session_key);

        $this->app->singleton(Cart::class, function ($app) use($storage, $session_key) {
            return new Cart(
                $storage,
                //$app['session'],
                $app['events'],
                'cart',
                $session_key,
                config('fleetcart.modules.cart.config')
            );
        });

        $this->app->alias(Cart::class, 'cart');
    }
}
