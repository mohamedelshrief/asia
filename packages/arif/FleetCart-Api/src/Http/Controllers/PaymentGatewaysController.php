<?php


namespace FleetCartApi\Http\Controllers;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Address\Entities\Address;
use Modules\Payment\Facades\Gateway;
use Modules\Support\Country;

class PaymentGatewaysController
{
    public function index(): JsonResponse
    {
        $gateways = Gateway::all();
        return response()->json($gateways);
    }

    public function getPaymentGateways(Request $request)
    {
        $gateways = Gateway::all()->toArray();
        if($request->address_id){
            $address = Address::find($request->address_id);
            if($address->city_name == "Al-Ain" || $address->city_name == "العين"){
                return $gateways;
            }
        }
        unset($gateways["cod"]);
        return $gateways;
    }
}
