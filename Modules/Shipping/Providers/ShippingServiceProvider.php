<?php

namespace Modules\Shipping\Providers;

use Modules\Shipping\Method;
use Illuminate\Support\ServiceProvider;
use Modules\Shipping\Facades\ShippingMethod;

class ShippingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (! config('app.installed')) {
            return;
        }

        $this->registerFreeShipping();
        $this->registerLocalPickup();
        $this->registerFlatRate();
        $this->registerEmiratesPost();
    }

    private function registerFreeShipping()
    {
        if (! setting('free_shipping_enabled')) {
            return;
        }

        ShippingMethod::register('free_shipping', function () {
            return new Method('free_shipping', setting('free_shipping_label'), 0);
        });
    }

    private function registerLocalPickup()
    {
        if (! setting('local_pickup_enabled')) {
            return;
        }

        ShippingMethod::register('local_pickup', function () {
            return new Method('local_pickup', setting('local_pickup_label'), setting('local_pickup_cost'));
        });
    }

    private function registerFlatRate()
    {
        if (! setting('flat_rate_enabled')) {
            return;
        }

        ShippingMethod::register('flat_rate', function () {
            return new Method('flat_rate', setting('flat_rate_label'), setting('flat_rate_cost'));
        });
    }
    private function registerEmiratesPost()
    {
        if (! setting('emirates_post_enabled')) {
            return;
        }

        ShippingMethod::register('emirates_post', function () {
            return new Method('emirates_post', setting('emirates_post_label'), 100);
        });
    }
}
