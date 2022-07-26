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
            $client = new Client();
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
                        "DestinationCity"=>"1",
                        "Height"=>"25",
                        "Width"=>"20",
                        "Length"=>"30",
                        "DimensionUnit"=>"Centimetre",
                        "Weight"=>"1000",
                        "WeightUnit"=>"Grams",
                        "CalculationCurrencyCode"=>"AED",
                        "IsRegistered"=>"No",
                        "ProductCode"=>"EPG-22",
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
                        "DestinationCity"=>"1",
                        "Height"=>"25",
                        "Width"=>"20",
                        "Length"=>"30",
                        "DimensionUnit"=>"Centimetre",
                        "Weight"=>"1000",
                        "WeightUnit"=>"Grams",
                        "CalculationCurrencyCode"=>"AED",
                        "IsRegistered"=>"No",
                        "ProductCode"=>"EPG-21",
                    ]
                ];
            }
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

            return $json_data;
            //return $json_data->RateCalculation->RateList;
    }



}
