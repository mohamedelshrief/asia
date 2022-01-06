<?php

namespace Modules\Account\Http\Controllers;
use GuzzleHttp\Client;

class AccountOrdersController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = auth()->user()
            ->orders()
            ->latest()
            ->paginate(20);

        return view('public.account.orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = auth()->user()
            ->orders()
            ->with(['products', 'coupon', 'taxes'])
            ->where('id', $id)
            ->firstOrFail();

        return view('public.account.orders.show', compact('order'));
    }

    public function tracking($id){
        $order = auth()->user()
            ->orders()
            ->with(['products', 'coupon', 'taxes'])
            ->where('id', $id)
            ->firstOrFail();
        return view('public.account.orders.Tracking', compact('order'));
    }
    public function getTracking($id){
            //Tracking
            $client = new Client();

            $response = $client->get('https://osbtest.epg.gov.ae/ebs/epg.pos.trackandtrace.rest/GetTrackDetails?track_id='.$id, [
                'headers' => [
                    'Authorization'=>'Basic '.base64_encode("osb.user:EPG@12345"),
                    'Content-Type'=>'application/json'
                ]
            ]);

            $body = $response->getBody();
            $json_data=json_decode($body);
            return $json_data;
    }
}
