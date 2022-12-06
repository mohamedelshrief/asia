<?php

namespace Modules\Cart\Http\Controllers;
use Modules\Cart\Facades\Cart;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Modules\Address\Entities\Address;
use Modules\Shipping\Facades\ShippingMethod;

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

    public function ShippingPricing(Request $request){
        Cart::removeShippingMethod();
        $cart=json_decode(Cart::instance());
        $weight=0;
        foreach ($cart->items as $key => $item) {
            $weightCount=floatval($item->product->weight)*$item->qty;
            $weight+=$weightCount;
        }
        $shippingWeight=$weight*1000;
        $client = new Client();
        $address=Address::first();
        if(isset($request->city_id)){
            $payload=[
                "RateCalculationRequest"=>[
                    "ShipmentType"=>"Express",
                    "ServiceType"=>"Domestic",
                    "ContentTypeCode"=>"NonDocument",
                    "OriginState"=>null,
                    "OriginCity"=>"1",
                    "DestinationCountry"=>"971",
                    "DestinationState"=>null,
                    "DestinationCity"=>$address->city,
                    "Height"=>"25",
                    "Width"=>"20",
                    "Length"=>"30",
                    "DimensionUnit"=>"Centimetre",
                    "Weight"=>$shippingWeight,
                    "WeightUnit"=>"Grams",
                    "CalculationCurrencyCode"=>"AED",
                    "IsRegistered"=>"No",
                    "ProductCode"=>"EPG-21",
                ]
            ];
        }else{
            // $address=Address::where("id",$request->address_id)->first();
            $payload=[
                "RateCalculationRequest"=>[
                    "ShipmentType"=>"Express",
                    "ServiceType"=>"Domestic",
                    "ContentTypeCode"=>"NonDocument",
                    "OriginState"=>null,
                    "OriginCity"=>"1",
                    "DestinationCountry"=>"971",
                    "DestinationState"=>null,
                    "DestinationCity"=>$address->city,
                    "Height"=>"25",
                    "Width"=>"20",
                    "Length"=>"30",
                    "DimensionUnit"=>"Centimetre",
                    "Weight"=>$shippingWeight,
                    "WeightUnit"=>"Grams",
                    "CalculationCurrencyCode"=>"AED",
                    "IsRegistered"=>"No",
                    "ProductCode"=>"EPG-21",
                ]
            ];
        }
        try {
            $json_data = [
                'RateCalculation' => [
                    'RateList' => [
                        [
                            'TotalPriceAED' => Cart::shippingCost()->amount(),
                        ]
                    ]
                ]
            ];

            $shippingMethod = ShippingMethod::available()->first();
            if($shippingMethod->name != "emirates_post"){
                // $shippingMethod->cost->amount = 100;
                Cart::addShippingMethod($shippingMethod);
                return Cart::instance();
            }
            // dd($shippingMethod);
            

            // if(setting("local_pickup_enabled")){
            //     $json_data["RateCalculation"]["RateList"][0]["TotalPriceAED"] = (float)setting("local_pickup_cost");
            //     $shippingMethod->cost->amount = 100;
                
            //     return $json_data;
            // }

            // if(setting("free_shipping_enabled")){
            //     $json_data["RateCalculation"]["RateList"][0]["TotalPriceAED"] = 0;
            //     return $json_data;
            // }

            // if(setting("flat_rate_enabled")){
            //     $json_data["RateCalculation"]["RateList"][0]["TotalPriceAED"] = (float)setting("flat_rate_cost");
            //     return $json_data;
            // }

            $response = $client->post('https://osb.epg.gov.ae/ebs/genericapi/ratecalculator/rest/CalculatePriceRate', [
                'json' => $payload,
                'headers' => [
                    'AccountNo'=>'C681131',
                    'Password'=>'C681131',
                    'Content-Type'=>'application/json'
                ]
                ]);

            $body = $response->getBody();
            $json_data=json_decode($body);

            // session()->put(auth()->id()."-shippingResponse",$json_data);
            // session()->put(auth()->id()."-shippingResponse",NULL);
            // return $json_data;
        } catch (\Exception $exception) {
            // session()->put(auth()->id()."-shippingResponse",$json_data);
            // session()->put(auth()->id()."-shippingResponse",NULL);
            $shippingMethod->cost->amount = $json_data["RateCalculation"]["RateList"][0]["TotalPriceAED"];
            Cart::addShippingMethod($shippingMethod);
            return Cart::instance();

            // return $json_data;
        }
        // session()->put(auth()->id()."-shippingResponse",$json_data);
        // session()->put(auth()->id()."-shippingResponse",NULL);
        $shippingMethod->cost->amount = 30;
        Cart::addShippingMethod($shippingMethod);
        return Cart::instance();
        // return $json_data;
        //return $json_data->RateCalculation->RateList;
    }

    public function ShippingPricingWeb(Request $request){
        $cart=json_decode(Cart::instance());
        $weight=0;
        foreach ($cart->items as $key => $item) {
            $weightCount=floatval($item->product->weight)*$item->qty;
            $weight+=$weightCount;
        }
        $shippingWeight=$weight*1000;
        $client = new Client();
        $address=Address::first();
        if(isset($request->city_id)){
            $payload=[
                "RateCalculationRequest"=>[
                    "ShipmentType"=>"Express",
                    "ServiceType"=>"Domestic",
                    "ContentTypeCode"=>"NonDocument",
                    "OriginState"=>null,
                    "OriginCity"=>"1",
                    "DestinationCountry"=>"971",
                    "DestinationState"=>null,
                    "DestinationCity"=>$address->city,
                    "Height"=>"25",
                    "Width"=>"20",
                    "Length"=>"30",
                    "DimensionUnit"=>"Centimetre",
                    "Weight"=>$shippingWeight,
                    "WeightUnit"=>"Grams",
                    "CalculationCurrencyCode"=>"AED",
                    "IsRegistered"=>"No",
                    "ProductCode"=>"EPG-21",
                ]
            ];
        }else{
            // $address=Address::where("id",$request->address_id)->first();
            $payload=[
                "RateCalculationRequest"=>[
                    "ShipmentType"=>"Express",
                    "ServiceType"=>"Domestic",
                    "ContentTypeCode"=>"NonDocument",
                    "OriginState"=>null,
                    "OriginCity"=>"1",
                    "DestinationCountry"=>"971",
                    "DestinationState"=>null,
                    "DestinationCity"=>$address->city,
                    "Height"=>"25",
                    "Width"=>"20",
                    "Length"=>"30",
                    "DimensionUnit"=>"Centimetre",
                    "Weight"=>$shippingWeight,
                    "WeightUnit"=>"Grams",
                    "CalculationCurrencyCode"=>"AED",
                    "IsRegistered"=>"No",
                    "ProductCode"=>"EPG-21",
                ]
            ];
        }
        try {
            $json_data = [
                'RateCalculation' => [
                    'RateList' => [
                        [
                            'TotalPriceAED' => 20,
                        ]
                    ]
                ]
            ];

            // if(request()->route()->getName() != "cart.index") {
                $response = $client->post('https://osb.epg.gov.ae/ebs/genericapi/ratecalculator/rest/CalculatePriceRate', [
                    'json' => $payload,
                    'headers' => [
                        'AccountNo'=>'C681131',
                        'Password'=>'C681131',
                        'Content-Type'=>'application/json'
                    ]
                    ]);
    
                $body = $response->getBody();
                $json_data=json_decode($body);
    
                session()->put(auth()->id()."-shippingResponse",$json_data);
                // session()->put(auth()->id()."-shippingResponse",NULL);
                // return $json_data;
            // }
        } catch (\Exception $exception) {
            session()->put(auth()->id()."-shippingResponse",$json_data);
            // session()->put(auth()->id()."-shippingResponse",NULL);
            return $json_data;
        }
        session()->put(auth()->id()."-shippingResponse",$json_data);
        // session()->put(auth()->id()."-shippingResponse",NULL);
        return $json_data;
        //return $json_data->RateCalculation->RateList;
    }
}
