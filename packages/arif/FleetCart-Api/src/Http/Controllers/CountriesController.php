<?php


namespace FleetCartApi\Http\Controllers;


use Illuminate\Http\JsonResponse;
use Modules\Support\Country;
use Modules\Support\State;

class CountriesController
{
    public function index()
    {
        $countries = Country::all();
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
        $cities = State::get($country);
        return response()->json($cities);
    }
}
