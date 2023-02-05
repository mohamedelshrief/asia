<?php


namespace FleetCartApi\Http\Controllers;


use Illuminate\Http\JsonResponse;
use Modules\Support\Country;
use Modules\Support\State;
use Modules\Setting\Entities\Country as CountryDB;
use GuzzleHttp\Client;
use Modules\Setting\Entities\City;
class CountriesController
{
    public function index()
    {
        $countries = Country::supported();
        $json= (array)[];
        foreach ($countries as $key => $value) {
            $json[]=[
                    "name"=>$value,
                    "code"=>$key
            ];
        }
        return (array)$json;
    }

    public function city($country): JsonResponse
    {
        //$country=CountryDB::where("country_code",$country)->first();
        if(isset($country)){
            $client = new Client();
            if(locale() == "ar"){
                $cities=City::where("CountryCode",$country)->select('Cityid','CityNameAR as CityName')->get();
            }
            else{
                $cities=City::where("CountryCode",$country)->select('Cityid','CityName')->get();
            }
            /*$response = $client->get('https://osbtest.epg.gov.ae/ebs/genericapi/lookups/rest/GetCitiesByCountryId?CountryId='.$country->country_id, [
                'headers' => [
                'AccountNo'=>'C175120',
                'Password'=>'C175120',
                'Content-Type'=>'application/json'
                ]
            ]);

            $body = $response->getBody();
            $json_data=json_decode($body);

            $cities=$json_data->CitiesByCountryIdResponse->Cities->City;

            foreach ($cities as $key => $index) {
                $city=new City;
                $city->CountryCode=$country->country_code;
                $city->Cityid=$index->Cityid;
                $city->CityName=$index->CityName;
                $city->CityNameAR=$index->CityNameAR;
                $city->save();
            }*/
            return response()->json($cities);
        }else{

            return response()->json(null);
        }
    }
}
