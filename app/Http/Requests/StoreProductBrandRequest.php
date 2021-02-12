<?php

namespace App\Http\Requests;

use App\Models\ProductBrand;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductBrandRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_brand_create');
    }

    public function rules()
    {
        return [
            'name'   => [
                'string',
                'required',
            ],
            'active' => [
                'required',
            ],
        ];
    }
}
