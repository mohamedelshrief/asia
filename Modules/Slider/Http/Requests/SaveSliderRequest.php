<?php

namespace Modules\Slider\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Modules\Core\Http\Requests\Request;

class SaveSliderRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'slider::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }

    protected function failedValidation(Validator $errors){
        if(request()->wantsJson()){
            return $errors;
        }
        return back()->withInput()->withError($errors->errors()->first());
    }
}
