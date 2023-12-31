<?php

namespace FleetCartApi\Services;

use Modules\Cart\Facades\Cart;
use Modules\Order\Entities\Order;
use Modules\FlashSale\Entities\FlashSale;
use Modules\Currency\Entities\CurrencyRate;
use Modules\Product\Entities\Product;
use Modules\Shipping\Facades\ShippingMethod;

class OrderService
{
    public function create($request)
    {
        $this->mergeShippingAddress($request);
        $this->addShippingMethodToCart($request);

        return tap($this->store($request), function ($order) {
            $this->storeOrderProducts($order);
            $this->storeFlashSaleProductOrders($order);
            $this->incrementCouponUsage($order);
            $this->attachTaxes($order);
            $this->reduceStock();
        });
    }

    private function mergeShippingAddress($request)
    {
        $request->merge([
            'shipping' => $request->ship_to_a_different_address ? $request->shipping : $request->billing,
        ]);
    }

    private function addShippingMethodToCart($request)
    {
        if (! Cart::hasShippingMethod()) {
            Cart::addShippingMethod(ShippingMethod::get($request->shipping_method));
        }
    }

    private function store($request)
    {
        return Order::create([
            'customer_id' => auth()->id(),
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'customer_first_name' => $request->billing['first_name'],
            'customer_last_name' => $request->billing['last_name'],
            'billing_first_name' => $request->billing['first_name'],
            'billing_last_name' => $request->billing['last_name'],
            'billing_address_1' => $request->billing['address_1'],
            'billing_address_2' => $request->billing['address_2'] ?? null,
            'billing_city' => $request->billing['city'],
            'billing_state' => $request->billing['state'],
            'billing_zip' => $request->billing['zip'],
            'billing_country' => $request->billing['country'],
            'shipping_first_name' => $request->shipping['first_name'],
            'shipping_last_name' => $request->shipping['last_name'],
            'shipping_address_1' => $request->shipping['address_1'],
            'shipping_address_2' => $request->shipping['address_2'] ?? null,
            'shipping_city' => $request->shipping['city'],
            'shipping_state' => $request->shipping['state'],
            'shipping_zip' => $request->shipping['zip'],
            'shipping_country' => $request->shipping['country'],
            'sub_total' => $request->sub_total,
            'shipping_method' => $request->shipping_method,
            'shipping_cost' => $request->shipping_cost,
            'coupon_id' => $request->coupon_id,
            'discount' => $request->discount,
            'total' => $request->total,
            'payment_method' => $request->payment_method,
            'currency' => currency(),
            'currency_rate' => CurrencyRate::for(currency()),
            'locale' => locale(),
            'status' => Order::PENDING,
            'note' => $request->order_note,
        ]);
    }

    private function storeOrderProducts(Order $order)
    {
        collect(request('items'))->each(function ($cartItem) use ($order) {
            $cartItem = (object)$cartItem;
            $cartItem->product = Product::find($cartItem->product['id']);

            $unitPrice = $cartItem->product->price->amount();
            $orderProduct = $order->products()->create([
                'product_id' => $cartItem->product->id,
                'unit_price' => $unitPrice,
                'qty' => $cartItem->qty,
                'line_total' => $unitPrice * $cartItem->qty,
            ]);

            $orderProduct->storeOptions(collect($cartItem->options));
            // $order->storeProducts($cartItem);
        });
    }

    private function storeFlashSaleProductOrders(Order $order)
    {
        // need to implement later
        return false;

        Cart::items()->each(function ($cartItem) use ($order) {
            if (! FlashSale::contains($cartItem->product)) {
                return;
            }

            FlashSale::pivot($cartItem->product)
                ->orders()
                ->attach([
                    $cartItem->product->id => [
                        'order_id' => $order->id,
                        'qty' => $cartItem->qty,
                    ],
                ]);
        });
    }

    private function incrementCouponUsage()
    {
        return;
        Cart::coupon()->usedOnce();
    }

    private function attachTaxes(Order $order)
    {
        return;
        Cart::taxes()->each(function ($cartTax) use ($order) {
            $order->attachTax($cartTax);
        });
    }

    public function reduceStock()
    {
        return;
        Cart::reduceStock();
    }

    public function delete(Order $order)
    {
        $order->delete();

        Cart::restoreStock();
    }
}
