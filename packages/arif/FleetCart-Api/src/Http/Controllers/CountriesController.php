<?php


namespace FleetCartApi\Http\Controllers;


use Illuminate\Http\JsonResponse;
use Modules\Support\Country;
use Modules\Support\State;
use Modules\Setting\Entities\Country as CountryDB;
use GuzzleHttp\Client;
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
        $country=CountryDB::where("country_code",$country)->first();
        if(isset($country)){
            $client = new Client();

            $response = $client->get('https://osbtest.epg.gov.ae/ebs/genericapi/lookups/rest/GetCitiesByCountryId?CountryId='.$country->country_id, [
                'headers' => [
                'AccountNo'=>'C175120',
                'Password'=>'C175120',
                'Content-Type'=>'application/json'
                ]
            ]);

            $body = $response->getBody();
            $json_data=json_decode($body);

            $cities=$json_data->CitiesByCountryIdResponse->Cities->City;
            return response()->json($cities);
        }else{

            return response()->json(null);
        }
    }
}
