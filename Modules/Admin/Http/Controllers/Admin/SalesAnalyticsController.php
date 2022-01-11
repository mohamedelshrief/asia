<?php

namespace Modules\Admin\Http\Controllers\Admin;

use Modules\Order\Entities\Order;
use Ladumor\OneSignal\OneSignal;


class SalesAnalyticsController
{
    /**
     * Display a listing of the resource.
     *
     * @param \Modules\Order\Entities\Order $order
     * @return \Illuminate\Http\Response
     */
    public function index(Order $order)
    {
        return response()->json([
            'labels' => trans('admin::dashboard.sales_analytics.day_names'),
            'data' => $order->salesAnalytics(),
        ]);
    }
    public function test(){


        $device_ids = array('8970e282-72bd-11ec-96e5-3ae6363ac16c');

        $content = array(
            "en" => "Order Delivered"
        );
        $headings = array(
            "en" => "Order"
        );
        $data = array(
                "title"          => 'Order',
                "message"        => 'Order Delivered'
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
        echo $response;
    }
}
