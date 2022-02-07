<?php

namespace Modules\Checkout\Http\Controllers;

use Exception;
use Modules\Order\Entities\Order;
use Modules\Payment\Facades\Gateway;
use Modules\Checkout\Events\OrderPlaced;
use Modules\Checkout\Services\OrderService;
use Modules\User\Entities\User;

class CheckoutCompleteController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param int $orderId
     * @param \Modules\Checkout\Services\OrderService $orderService
     * @return \Illuminate\Http\Response
     */
    public function store($orderId, OrderService $orderService)
    {
        $order = Order::findOrFail($orderId);
        return request('paymentMethod');

        $gateway = Gateway::get(request('paymentMethod'));

        try {
            $response = $gateway->complete($order);
        } catch (Exception $e) {
            $orderService->delete($order);

            return response()->json([
                'message' => $e->getMessage(),
            ], 403);
        }

        $order->storeTransaction($response);

        event(new OrderPlaced($order));

        $this->pushNotification($order,"Order Placed","Congratulations! Your order has been placed");

        if (! request()->ajax()) {
            return redirect()->route('checkout.complete.show');
        }
    }
    public function pushNotification($order,$title,$description){
        $user=User::where("id",$order->customer_id)->first();

        $device_ids = array($user->player_id);

        $content = array(
            "en" => $description
        );
        $headings = array(
            "en" => $title
        );
        $data = array(
                "title"          => $title,
                "message"        => $description
            );
        $fields = array(
            'app_id' => '209cfc78-58d5-4fd7-ba64-ac38a41c7aab', // your api key
            'include_player_ids' => $device_ids,
            'data' => $data,
            'large_icon' => "https://i.ibb.co/F8QtR4Q/G73-Yp-QKn-Lo-ZBpy-Y3-MYDvmpd-M1-Bq-C2j-HA32ms-It-Ls.png",
            'headings' => $headings,
            'contents' => $content
        );

        $sendContent = json_encode($fields);


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                            array('Content-Type: application/json;
                                    charset=utf-8',
                                    'Authorization: Basic OGI4MjA5MDktYzIyMS00MDA3LWE4MDYtMWIyNTE4YzNjZDk1' // your api key
                            ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $sendContent);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $order = session('placed_order');

        if (is_null($order)) {
            return redirect()->route('home');
        }

        return view('public.checkout.complete.show', compact('order'));
    }
}
