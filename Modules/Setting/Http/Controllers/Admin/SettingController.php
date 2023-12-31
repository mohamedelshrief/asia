<?php

namespace Modules\Setting\Http\Controllers\Admin;

use Illuminate\Support\Facades\Artisan;
use Modules\Admin\Ui\Facades\TabManager;
use Modules\Setting\Http\Requests\UpdateSettingRequest;
use Illuminate\Http\JsonResponse;
use DB;
use Modules\Setting\Entities\City;

class SettingController
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $settings = setting()->all();
        $tabs = TabManager::get('settings');

        return view('setting::admin.settings.edit', compact('settings', 'tabs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingRequest $request)
    {
        setting($request->except('_token', '_method'));
        $this->handleMaintenanceMode($request);


        return redirect(non_localized_url())
            ->with('success', trans('setting::messages.settings_have_been_saved'));
    }

    private function handleMaintenanceMode($request)
    {
        if ($request->maintenance_mode) {
            Artisan::call('down');
        } elseif (app()->isDownForMaintenance()) {
            Artisan::call('up');
        }
    }

    public function city($country): JsonResponse
    {
        if(isset($country)){
            $cities=City::where("CountryCode",$country)->select('Cityid','CityName','CityNameAR')->limit(100)->get()->chunk(30);
            return response()->json($cities);
        }else{
            return response()->json(null);
        }
    }
}
