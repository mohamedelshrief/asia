<?php

use \Illuminate\Support\Facades\Route;

Route::prefix('api')
    ->middleware('api_cors')
    ->group(function () {

        Route::middleware('auth:api')
            ->group(function () {

                Route::post('/products/{product}/reviews', \FleetCartApi\Http\Controllers\Account\AccountReviewController::class . '@store');

                Route::prefix('me')->group(function () {
                    Route::get('/', \FleetCartApi\Http\Controllers\Auth\AuthController::class . '@me');
                    Route::get('/orders', \FleetCartApi\Http\Controllers\Account\OrderController::class . '@index');
                    Route::get('/orders/{id}', \FleetCartApi\Http\Controllers\Account\OrderController::class . '@index');
                    Route::get('/orders/recent', \FleetCartApi\Http\Controllers\Account\OrderController::class . '@recent');
                    Route::post('/update', \FleetCartApi\Http\Controllers\Auth\AuthController::class . '@update_me');
                    Route::get('/reviews', \FleetCartApi\Http\Controllers\Account\AccountReviewController::class . '@index');
                    Route::get('/wishlist', \FleetCartApi\Http\Controllers\Account\WishlistController::class . '@index');
                    Route::post('/wishlist', \FleetCartApi\Http\Controllers\Account\WishlistController::class . '@toggle');
                    Route::post('/wishlist/store', \FleetCartApi\Http\Controllers\Account\WishlistController::class . '@store');
                    Route::delete('/wishlist/{id}', \FleetCartApi\Http\Controllers\Account\WishlistController::class . '@destroy');

                    // Addresses API
                    Route::get("get-addresses",\FleetCartApi\Http\Controllers\Auth\AuthController::class . '@get_addresses');
                    Route::post("add_address",\FleetCartApi\Http\Controllers\Auth\AuthController::class. '@add_address');
                    Route::post("update_address/{id}",\FleetCartApi\Http\Controllers\Auth\AuthController::class. '@update_address');
                    Route::post("delete_address",\FleetCartApi\Http\Controllers\Auth\AuthController::class. '@delete_address');
                });



            });


        Route::post('/register', \FleetCartApi\Http\Controllers\Auth\AuthController::class . '@postRegister');
        Route::post('/login', \FleetCartApi\Http\Controllers\Auth\AuthController::class . '@postLogin');
        Route::post('/logout', \FleetCartApi\Http\Controllers\Auth\AuthController::class . '@logout');
        Route::post('/password/reset/token', \FleetCartApi\Http\Controllers\Auth\PasswordResetController::class . '@create');
        Route::post('/password/reset', \FleetCartApi\Http\Controllers\Auth\PasswordResetController::class . '@reset');
        Route::post('/contact', \FleetCartApi\Http\Controllers\ContactController::class . '@store');
        Route::get('/sliders', \FleetCartApi\Http\Controllers\SettingsController::class . '@sliders');

        Route::get('/home-page-products', \FleetCartApi\Http\Controllers\ProductController::class . '@HomepageProduct');
        Route::get('/new-arrival', \FleetCartApi\Http\Controllers\ProductController::class . '@newArrivalProducts');
        Route::get('/recommeded-products', \FleetCartApi\Http\Controllers\ProductController::class . '@recommededProducts');
        Route::get('/most-recommeded-products', \FleetCartApi\Http\Controllers\ProductController::class . '@mostPurchaseProducts');
        Route::get('/products', \FleetCartApi\Http\Controllers\ProductController::class . '@index');
        Route::get('/flash-sale-products', \Themes\Storefront\Http\Controllers\FlashSaleProductController::class . '@index');
        Route::get('/products/{slug}', \FleetCartApi\Http\Controllers\ProductController::class . '@show');
        Route::get('/categories', \FleetCartApi\Http\Controllers\CategoryController::class . '@index');
        Route::get('/settings', \FleetCartApi\Http\Controllers\SettingsController::class . '@index');
        Route::get('/countries', \FleetCartApi\Http\Controllers\CountriesController::class . '@index');
        Route::get('/cities/{country}', \FleetCartApi\Http\Controllers\CountriesController::class . '@city');
        Route::get('/payment-gateways', \FleetCartApi\Http\Controllers\PaymentGatewaysController::class . '@index');
        Route::post('/checkout', \FleetCartApi\Http\Controllers\CheckoutController::class . '@store');

        //Cart
        Route::get('/get-cart/{id}', \FleetCartApi\Http\Controllers\CheckoutController::class . '@getCart');
        Route::get('cart', Modules\Cart\Http\Controllers\CartController::class . '@index');
        Route::post('cart/items', Modules\Cart\Http\Controllers\Api\CartItemController::class . '@store');
        Route::put('cart/items/{cartItemId}', Modules\Cart\Http\Controllers\Api\CartItemController::class . '@update');
        Route::delete('cart/items/{cartItemId}', Modules\Cart\Http\Controllers\Api\CartItemController::class . '@destroy');
        Route::post('cart/clear', Modules\Cart\Http\Controllers\CartClearController::class . '@store');
        Route::post('cart/shipping-method', Modules\Cart\Http\Controllers\CartShippingMethodController::class . '@store');

        Route::post('cart/coupon', Modules\Coupon\Http\Controllers\CartCouponController::class . '@store');
        Route::delete('cart/remove/coupon', Modules\Coupon\Http\Controllers\CartCouponController::class . '@destroy');



    });
