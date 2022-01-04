<?php

namespace Modules\Translation\Http\Controllers\Admin;

use Modules\Translation\Entities\Translation;
use Google\Cloud\Translate\TranslateClient;

class TranslationController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $translations = Translation::retrieve();

        return view('translation::admin.translations.index', compact('translations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param string $key
     * @return \Illuminate\Http\Response
     */
    public function update($key)
    {
        Translation::firstOrCreate(['key' => $key])
            ->translations()
            ->updateOrCreate(
                ['locale' => request('locale')],
                ['value' => request('value', '')]
            );

        return trans('admin::messages.resource_saved', ['resource' => trans('translation::translations.translation')]);
    }

    public function importAr(){
        $model = 'nmt';
        $targetLanguage="ar";

        $translations = Translation::retrieve();
        //return  $translations ;
        foreach ($translations as $key => $value) {


            $text=$value["en"];
            $translate = new TranslateClient([
                'key' => 'AIzaSyCyq4SL-0HABmZzzJoAc7jhhwOo65qhqTg'
            ]);
            $result = $translate->translate($text, [
                'target' => $targetLanguage,
                'model' => $model,
            ]);


            Translation::firstOrCreate(['key' => $key])
            ->translations()
            ->updateOrCreate(
                ['locale' => "ar"],
                ['value' => $result["text"]]
            );
            echo $key."  ---   ".$result["text"]."<br/>";
        }


    }
}
