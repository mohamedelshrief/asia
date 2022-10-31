<?php

namespace Modules\Cart\Http\Controllers;
use Modules\Cart\Facades\Cart;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Modules\Address\Entities\Address;

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
                $address=Address::where("id",$request->address_id)->first();
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
                return $json_data;
            } catch (\Exception $exception) {
                $response = [
                    'RateCalculation' => [
                        'RateList' => [
                            [
                                'TotalPriceAED' => 0,
                            ]
                        ]
                    ]
                ];
                session()->put(auth()->id()."-shippingResponse",$response);
                // session()->put(auth()->id()."-shippingResponse",NULL);
                return $response;
            }
            //return $json_data->RateCalculation->RateList;
    }



}
