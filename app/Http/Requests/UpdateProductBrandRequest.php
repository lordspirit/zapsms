<?php

namespace App\Http\Requests;

use App\Models\ProductBrand;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductBrandRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_brand_edit');
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
