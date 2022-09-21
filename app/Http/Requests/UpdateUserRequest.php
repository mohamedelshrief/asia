<?php

namespace FleetCart\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['nullable','email', Rule::unique('users')->ignore($this->email, 'email')],
            'phone' => ['required'],
            'first_name' => ['required','string'],
            'last_name' => ['required','string'],
            'image' => ['nullable','string'],
            'old_password' => ['nullable'],
            'password' => ['nullable', 'confirmed', 'min:6'],
        ];
    }

    public function messages()
    {
        return [
            "phone.required"=>"phone number is required",
        ];
    }
}
