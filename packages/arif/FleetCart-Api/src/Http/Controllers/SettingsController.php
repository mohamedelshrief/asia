<?php

namespace FleetCartApi\Http\Controllers;


use Illuminate\Http\JsonResponse;
use Modules\Slider\Entities\Slider;
use Modules\Admin\Ui\Facades\TabManager;
use Modules\Support\Country;
use Modules\Setting\Entities\City;
use Modules\Payment\Facades\Gateway;
use Modules\Address\Entities\DefaultAddress;
use Modules\Page\Entities\Page;

class SettingsController
{
    public function index()
    {
        $settings = setting()->all();

        $tabs = TabManager::get('settings');
        // $payment_gateways = Gateway::all();
        $payment_gateways = Gateway::all()->toArray();

        if(locale() == "ar"){
            // dd($payment_gateways);
            if(isset($payment_gateways["ngenius"])){
                $payment_gateways["ngenius"]->label = "ادفع عبر الإنترنت";
                $payment_gateways["ngenius"]->description = "الدفع عبر بوابة الدفع N-genius";
            }
            if(isset($payment_gateways["cod"])){
                $payment_gateways["cod"]->label = "الدفع عند الاستلام";
                $payment_gateways["cod"]->description = "ادفع نقدا عند الاستلام";
            }
            // if(isset($payment_gateways->ngenius)){
            //     $payment_gateways->ngenius->label = "ادفع عبر الإنترنت";
            //     $payment_gateways->ngenius->description = "الدفع عبر بوابة الدفع N-genius";
            // }
        }

        $array = [
            'general' => [
                "supported_countries" => $settings['supported_countries'],
                "default_country" => $settings['default_country'],
                "supported_locales" => $settings['supported_locales'],
                "default_locale" => $settings['default_locale'],
                "default_timezone" => $settings['default_timezone'],
                "customer_role" => $settings['customer_role'],
                "store" => [
                    "store_name" => $settings['store_name'],
                    "store_tagline" => $settings['store_tagline'],
                    "store_email" => $settings['store_email'],
                    "store_phone" => $settings['store_phone'],
                    "store_address_1" => $settings['store_address_1'],
                    "store_address_2" => $settings['store_address_2'],
                    "store_city" => $settings['store_city'],
                    "store_country" => $settings['store_country'],
                    "store_state" => $settings['store_state'],
                    "store_state" => $settings['store_state'],
                    "store_zip" => $settings['store_zip'],
                ],
                'currency' => [
                    "supported_currencies" => $settings['supported_currencies'],
                    "default_currency" => $settings['default_currency'],
                    "currency_rate_exchange_service" => $settings['currency_rate_exchange_service'],
                ],
                'enabled_countries' => Country::supported(),
                'payment_gateways' => $payment_gateways,
                // 'defaultAddress' => request()->user()->defaultAddress ?? new DefaultAddress,
                // 'addresses' => request()->user()->addresses->keyBy('id'),
                'termsPageURL' => Page::urlForPage(setting('storefront_terms_page')),
            ],
        ];

        return response()->json($array);

   }

    public function sliders(){
        $Sliders=Slider::all();

        return response()->json($Sliders);
    }
    public function searchCities($country,$city=""){

        if($city!=""){
            $cities=City::where("CountryCode",$country)->limit(20)->orderby('CityName','asc')->where("CityName",'LIKE',''.$city.'%')->get();
        }else{
            $cities=City::where("CountryCode",$country)->limit(20)->orderby('CityName','asc')->get();
        }

        $autocomplete=[];

        foreach ($cities as $key => $value) {
            $autocomplete[]=[
                "value"=>$value->Cityid,
                "label"=>$value->CityName,
            ];
        }

        return json_encode($autocomplete);
    }
}
