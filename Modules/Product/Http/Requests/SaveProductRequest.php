<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Product\Entities\Product;
use Modules\Core\Http\Requests\Request;

class SaveProductRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'product::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'slug' => $this->getSlugRules(),
            'name' => 'required',
            'description' => 'required',
	        'weight'=>'required',
            'brand_id' => ['required', Rule::exists('brands', 'id')],
            'tax_class_id' => ['nullable', Rule::exists('tax_classes', 'id')],
            'virtual' => 'required|boolean',
            'is_active' => 'required|boolean',
            'price' => 'required|numeric|min:0|max:99999999999999',
            'special_price' => 'nullable|numeric|min:0|max:99999999999999',
            'special_price_type' => ['nullable', Rule::in(['fixed', 'percent'])],
            'special_price_start' => 'nullable|date',
            'special_price_end' => 'nullable|date',
            'manage_stock' => 'required|boolean',
            'qty' => 'required_if:manage_stock,1|nullable|numeric',
            'in_stock' => 'required|boolean',
            'new_from' => 'nullable|date',
            'new_to' => 'nullable|date',
            'asin'=>'required',
            'sku'=>'required',
        ];
    }

    public function messages()
    {
        return [
            "name.required"=>trans('core::validation.required'),
            "description.required"=>trans('core::validation.required'),
            "weight.required"=>trans('core::validation.required'),
            "brand_id.required"=>trans('core::validation.required'),
            "asin.required"=>trans('core::validation.required'),
            "asin.unique"=>trans('core::validation.unique'),
            "sku.required"=>trans('core::validation.required'),
        ];
    }

    private function getSlugRules()
    {
        $rules = request()->route()->getName() === 'admin.products.update'
            ? ['required']
            : ['sometimes'];

        $slug = Product::withoutGlobalScope('active')->where('id', request()->id)->value('slug');
        $rules[] = Rule::unique('products', 'slug')->ignore($slug, 'slug');

        return $rules;
    }
}
