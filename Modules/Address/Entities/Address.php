<?php

namespace Modules\Address\Entities;

use Modules\Support\State;
use Modules\Support\Country;
use Modules\User\Entities\User;
use Modules\Support\Eloquent\Model;
use Modules\Setting\Entities\City;

class Address extends Model
{
    protected $fillable = ['first_name', 'last_name', 'address_1', 'address_2', 'city', 'state', 'zip', 'country','phone','label','default_address'];

    protected $appends = ['full_name', 'state_name', 'country_name','city_name'];

    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getStateNameAttribute()
    {
        return State::name($this->country, $this->state);
    }

    public function getCountryNameAttribute()
    {
        return Country::name($this->country);
    }
    public function getCityNameAttribute(){
        $city=City::where("Cityid",$this->city)->first();
        if($city){
            return $city->CityName;
        }else{
            return "";
        }
    }
}
